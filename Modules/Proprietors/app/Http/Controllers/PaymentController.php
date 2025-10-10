<?php 
namespace Modules\Proprietors\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
//ApplicationPayment
use Modules\Proprietors\Models\{ApprovalPayment,ApplicationPayment};
use App\Facades\Paystack;

use Modules\Registrations\Models\RegistrationApproval;
use Modules\Registrations\Services\ApprovalService;
use App\Models\User;
use App\Notifications\ApplicationApproved;



use Modules\Registrations\Models\Registration;
class PaymentController extends Controller
{
    
    /**
     * Show a payment detail / status page
     */
    public function show(Request $request, $type, $ownerId, $paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->load('owner');
        return view('proprietors::payments.show', compact('payment'));
    }

	/**
     * Store the user's choice (bank or online) and redirect accordingly
     */
    public function store(Request $request, $type, $ownerId)
    {
        $request->validate([
            'payment_type' => 'required|in:bank,online',
            'amount' => 'required_if:payment_type,bank|numeric|min:1',
            // if bank, require bank fields
            'sb' => 'required_if:payment_type,bank',
            'cmp' => 'required_if:payment_type,bank',
            'phone' => 'required_if:payment_type,bank',
            'redirect_to'=>'required'
            //'email' => 'required_if:payment_type,online|email',
        ]);

        // find the owning payment container
        if ($type === 'application') {
            $owner = ApplicationPayment::findOrFail($ownerId);
        } else {
            $owner = ApprovalPayment::findOrFail($ownerId);
        }


        // Create the Payment record in “pending” state
        $meta = [
            'amount' => $request->amount,
            'user_id' => $request->user()->id
        ];

        if ($request->payment_type === 'bank') {
            $meta['sb'] = $request->sb;
            $meta['cmp'] = $request->cmp;
            $meta['phone'] = $request->phone;
        }

        $payment = $owner->payments()->create([
            'payment_type' => $request->payment_type,
            'meta' => $meta,
            'status' => 'pending',
            'owner_id'=>auth()->user()->id,
            'redirect_to'=>json_decode($request->redirect_to)
        ]);

        if ($request->payment_type === 'online') {
            // initialize Paystack transaction

            /*$reference = Paystack::generateReference();
            $payment->reference = $reference;*/
            $reference =$payment->reference=class_basename($owner).'-'.($ownerId??0).'-'.($payment->id??0);


            $nmeta=$payment->meta??[];
            $ometa=$owner->meta??[];
            $nmeta['amount']=($ometa['fee']??0)+($ometa['applicable_charge']??0);
            $payment->meta=$nmeta;

            $payment->save();

            $paymentDetails = [
                'email' => $request->user()->email,
                'amount' => $nmeta['amount'] * 100, // in kobo if needed
                'reference' => $reference,
                'callback_url' => route('payments.callback', [
                    'type' => $type,
                    'ownerId' => $ownerId,
                    'paymentId' => $payment->id,
                ]),
            ];


            $response = (array)Paystack::transaction()
                ->initialize($paymentDetails)
                ->response();

            //dd($response);
            if (isset($response['status'])) {
                return back()->with('error', 'Could not initialize payment: ' . $response['message']);
            }
            //['data']
            return redirect($response['authorization_url']);
        } else {
            $payment->reference=class_basename($owner).'-'.($ownerId??0).'-'.($payment->id??0);


            try { 
                //$owner->load('application');
                //this allows the application to move to section G
                $app1=Registration::find($owner->registration_id);
                 
                $ndata=$app1->data??[];
                if ($type === 'application') {
                    //dd($app1);
                    //$type
                    $ndata['sectionF']=['reference'=>$payment->reference]; 
                }else{

                    $ndata['sectionH']=['reference'=>$payment->reference,'approval payment'];
                }
                    $app1->data=$ndata;//sectionA
                    $app1->save();
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
            $payment->save();


            // bank path: show “bank instructions” or “awaiting approval” page
            return redirect()->route('payments.show', [
                'type' => $type,
                'ownerId' => $ownerId,
                'paymentId' => $payment->id,
            ])->with('success', 'Await Confirmation');
        }
    }

    /**
     * Callback route from Paystack after payment
     */
    public function callback(Request $request, $type, $ownerId, $paymentId)
    {
        $payment = Payment::findOrFail($paymentId);

        // verify via Paystack
        $trx1 = Paystack::transaction()->verify($payment->reference)->response();

        $trx=(array)$trx1;

        if ($trx['status'] === 'success') {

            $parts=explode('-', $payment->reference);
            // update payment
            $payment->status = 'approved';
            // you may want to merge into meta more details
            $payment->meta = array_merge($payment->meta, [
                'gateway_response' => $trx,
            ]);
            $payment->save();


            /*if ($parts[0]=="ApplicationPayment") {
                # code...
            }*/

            if ($parts[0]=="ApplicationPayment" && isset($parts[1])) {
                # code...

                $owner = ApplicationPayment::findOrFail($parts[1]);

                $app1=Registration::find($owner->registration_id);
                 
                $ndata=$app1->data??[];
                $ndata['sectionF']=['reference'=>$payment->reference];
                $app1->data=$ndata;//sectionA
                    $app1->save();
            }
            if ($parts[0]=="ApprovalPayment" && isset($parts[1])) {
                # code...
                ApprovalService::finalApproval($parts[1],auth()->user());
            }

            return redirect()->route('payments.show', compact('type', 'ownerId', 'paymentId'))
                ->with('success', 'Payment successful.');
        } else {
            $payment->status = 'failed';
            $payment->save();
            return redirect()->route('payments.show', compact('type', 'ownerId', 'paymentId'))
                ->with('error', 'Payment verification failed.');
        }
    }
 

}