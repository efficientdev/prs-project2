<?php
//PayForApproval.php 
namespace Modules\Registrations\Http\Controllers\Issued;

use Modules\Registrations\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Title,User};
use Hash; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail;

use Modules\Registrations\Services\ApprovalService;
use App\Models\{PrvInsCategory,TRequirement};
use Modules\Proprietors\Models\{Application,ApprovalPayment}; 
use Illuminate\Support\Facades\Storage;

use App\Services\RedirectService;

/*class  extends Model
{
    
    protected $fillable = [
        'registration_id','meta','status',
        'user_id'
    ];*/

class PayForApproval extends Controller
{

    protected function createApprovalPayment($a){
        $p=ApprovalPayment::where(['registration_id'=>$a->id])->first();
        if($p==null){

            $data['v3']=PrvInsCategory::find($a->data['type_id']); 

            $application_fee=$data['v3']->category_app_fee??30000; 

            $charge=(((1.52/100)*$application_fee)+100);
            if ($charge>2500) {
                $charge=2500;
            }
            $data=$a->data??[];
            $ndata=[...$data, 
                'fee'=>$application_fee,
                'applicable_charge'=>$charge,
            ];
            $a->data=$ndata;
            //$a->save();

            ApprovalPayment::create([
                'registration_id'=>$a->id,
                'meta'=>[
                    'type_id'=>$a->data['type_id'],
                    'fee'=>$application_fee,
                    'applicable_charge'=>$charge,
                ],
                'user_id'=>auth()->user()->id
            ]);
        }

    }

	public function show(Request $request,$id){
		//id - application is
		$form = $a = Registration::findOrFail($id);
		$this->createApprovalPayment($a);

		/*$a->currentApproval()->where('registration_approval_stage_id',ApprovalService::$firstLetter)->first();*/


        Session::put("fid", $id);


        $a->load('approvalPayment');

        $type='approval';
        $payment=$a->approvalPayment;
        $ownerId=$payment->id??0;
    
        //dd($payment);
        $category=PrvInsCategory::find($a->data['type_id']);


		$form_id=$id;
        return view("registrations::portfolio.approval", compact('form','form_id','a','category','type','ownerId','payment'));

	}
}