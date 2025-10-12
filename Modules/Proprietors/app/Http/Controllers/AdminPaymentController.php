<?php

namespace Modules\Proprietors\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
    use Symfony\Component\HttpFoundation\StreamedResponse;


use Modules\Proprietors\Models\{ApprovalPayment,ApplicationPayment};
use Modules\Registrations\Models\Registration;
use Modules\Registrations\Services\ApprovalService;

class AdminPaymentController extends Controller
{
public function export(Request $request): StreamedResponse
{
    $query = Payment::with('payable');

    // Reuse same filters as in index()
    if ($search = $request->input('search')) {
        $query->where(function ($q) use ($search) {
            $q->where('id', 'like', "%{$search}%")
              ->orWhere('payable_type', 'like', "%{$search}%")
              ->orWhere('payment_type', 'like', "%{$search}%")
              ->orWhere('status', 'like', "%{$search}%")
              ->orWhere('reference', 'like', "%{$search}%")
              ->orWhereJsonContains('meta->amount', $search);
        });
    }

    if ($paymentType = $request->input('payment_type')) {
        $query->where('payment_type', $paymentType);
    }

    if ($status = $request->input('status')) {
        $query->where('status', $status);
    }

    if ($from = $request->input('from')) {
        $query->whereDate('created_at', '>=', $from);
    }

    if ($to = $request->input('to')) {
        $query->whereDate('created_at', '<=', $to);
    }

    $payments = $query->orderBy('created_at', 'desc')->get();

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="payments.csv"',
    ];

    $columns = ['ID', 'Payable Type', 'Payable ID', 'User ID', 'Type', 'Amount', 'Status', 'Reference', 'Created At'];

    $callback = function () use ($payments, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($payments as $p) {
            fputcsv($file, [
                $p->id,
                class_basename($p->payable_type),
                $p->payable_id,
                optional($p->payable)->user_id ?? '-',
                $p->payment_type,
                data_get($p->meta, 'amount'),
                $p->status,
                $p->reference,
                $p->created_at->toDateTimeString(),
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}

    /**
     * List all payments
     */
    public function index(Request $request)
{
    $query = Payment::with('payable');

    // Handle Search
    if ($search = $request->input('search')) {
        $query->where(function ($q) use ($search) {
            $q->where('id', 'like', "%{$search}%")
              ->orWhere('payable_type', 'like', "%{$search}%")
              ->orWhere('payment_type', 'like', "%{$search}%")
              ->orWhere('status', 'like', "%{$search}%")
              ->orWhere('reference', 'like', "%{$search}%")
              ->orWhereJsonContains('meta->amount', $search);
        });
    }

    // Handle Filters
    if ($paymentType = $request->input('payment_type')) {
        $query->where('payment_type', $paymentType);
    }

    if ($status = $request->input('status')) {
        $query->where('status', $status);
    }

    // Handle Sorting
    $sortField = $request->input('sort', 'created_at');
    $sortDirection = $request->input('direction', 'desc');

    $allowedSorts = ['id', 'payable_type', 'payment_type', 'status', 'reference', 'created_at'];
    if (!in_array($sortField, $allowedSorts)) {
        $sortField = 'created_at';
    }

    $query->orderBy($sortField, $sortDirection);

    $payments = $query->paginate(20)->appends($request->query());

    return view('proprietors::admin.payments.index', compact('payments'));
}

    public function index2()
    {
        $payments = Payment::with('payable')->orderBy('created_at', 'desc')->paginate(20);
        return view('proprietors::admin.payments.index', compact('payments'));
    }

    /**
     * Show a single payment
     */
    public function show($id)
    {
        $payment = Payment::with('payable')->findOrFail($id);
        return view('proprietors::admin.payments.show', compact('payment'));
    }

    /**
     * Approve a bank payment (or override)
     */
    public function approve(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        // only allow bank payments to be approved manually
        if ($payment->payment_type !== 'bank') {
            return back()->with('error', 'Only bank payments can be approved manually.');
        }
        $payment->status = 'approved';
        $payment->save();

        $payable=$payment->payable;
        $payable->status= 'approved';
        $payable->save();

        $application=$payable->application; 
        
        try {
            $parts=explode('-', $payment->reference); 
            $user=$payment->owner;
            if ($parts[0]=="ApprovalPayment" && isset($parts[1])) { 
                ApprovalService::finalApproval($parts[1],$user);
            } 

            if ($parts[0]=="ApplicationPayment" && isset($parts[1])) { 

                $owner = ApplicationPayment::findOrFail($parts[1]);

                $app1=Registration::find($owner->registration_id);
                 
                $ndata=$app1->data??[];
                $ndata['sectionF']=['reference'=>$payment->reference,'status'=>'Payment Approved','amount_paid'=>'#'.number_format($payment->meta['amount']??0,2)];
                $app1->data=$ndata;//sectionA
                $app1->save();
            }
        } catch (\Exception $e) {
            
        }


        /*if ($application->current_application_status_id==1) {
            $application->current_application_status_id=0;
            $application->current_reviewer_role='proprietor';
        }
        if ($application->current_application_status_id==13) {
            $application->current_application_status_id=15;
            $application->current_reviewer_role='proprietor';
        }
        $application->save();*/

        // you might want to notify the user, etc
        return redirect()->route('admin.payments.show', $payment->id)
            ->with('success', 'Payment approved.');
    }

    /**
     * Decline a payment
     */
    public function decline(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'declined';
        $payment->save();
        return redirect()->route('admin.payments.show', $payment->id)
            ->with('success', 'Payment declined.');
    }
}
