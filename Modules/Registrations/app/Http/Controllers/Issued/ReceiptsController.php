<?php
//ReceiptController 
namespace Modules\Registrations\Http\Controllers\Issued;

use Modules\Registrations\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Title,User};
use Hash; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\{PrvInsCategory,TRequirement};
use Modules\Proprietors\Models\{Application,ApplicationPayment,ApprovalPayment}; 
use Illuminate\Support\Facades\Storage;


class ReceiptsController extends Controller
{

	public function show(Request $request,$id){
		//id - application is
		
        Session::put("fid", $id);
		$form = $a = Registration::findOrFail($id);
		$a->load('registrationPayment','approvalPayment');


        return view("registrations::portfolio.receipts", ['form_id'=>$id,'form'=>$form,'a'=>$a]);
 
	}
 
    public function update(Request $request,$id)
    {
    	if (!$request->has('type')) {
    		abort(403);
    	}
    	if ($request->type=="application") {
    		# code...
    		$r=ApplicationPayment::where('registration_id',$id)->where('status','approved')->with('owner')->first();

    		//dd($r);

    		$t=PrvInsCategory::find($r->meta['type_id']??0);

	        // You can pass data to the view if needed
	        $data = [
	        	'name'=>$r->owner->name,
	        	'id'=>$r->owner->id,
	        	'email'=>$r->owner->email,
	        	'phone'=>$r->owner->meta['phone']??'n/a',
	        	'type'=>$t->category_name??'n/a',
	            'title' => 'Application Payment',
	            'payment_date'=>$r->created_at->toFormattedDateString(),
	            'date' => now()->toFormattedDateString(),
	            'items'=>$r->payments->toArray()
	        ];
			
			if($r!=null){
	        // Load the view and pass data
	        $pdf = Pdf::loadView('registrations::portfolio.template.receipt', $data);
	        
	        // Option to stream or download the PDF
	        return $pdf->download('receipt.pdf');}else{
	        	return back()->with('error','No receipt can be generated at the moment');
	        }

    	}else if ($request->type=="approval") {
    		# code...
    		$r=ApprovalPayment::where('registration_id',$id)->where('status','approved')->with('owner')->first();

    		//dd($r);
    		$t=PrvInsCategory::find($r->meta['type_id']??0);


	        // You can pass data to the view if needed
	        $data = [
	        	'name'=>$r->owner->name,
	        	'id'=>$r->owner->id, 
	        	'email'=>$r->owner->email,
	        	'phone'=>$r->owner->meta['phone']??'n/a',
	        	'type'=>$t->category_name??'n/a',
	            'title' => 'Approval Payment',
	            'payment_date'=>$r->created_at->toFormattedDateString(),
	            'date' => now()->toFormattedDateString(),
	            'items'=>$r->payments->toArray()
	        ];
	        if($r!=null){

		        // Load the view and pass data
		        $pdf = Pdf::loadView('registrations::portfolio.template.receipt', $data);

		        // Option to stream or download the PDF
		        return $pdf->download('receipt.pdf');
		    }else{
	        	return back()->with('error','No receipt can be generated at the moment');
	        }

    	}
    }
}
