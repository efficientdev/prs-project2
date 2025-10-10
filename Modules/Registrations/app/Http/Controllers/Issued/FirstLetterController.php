<?php
//FirstLetterController.php

namespace Modules\Registrations\Http\Controllers\Issued;

use Modules\Registrations\Models\{Registration,RegistrationApproval};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Title,User};
use Hash; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Modules\Registrations\Services\ApprovalService;
use App\Models\{PrvInsCategory,TRequirement};
use Modules\Proprietors\Models\{Application,ApplicationPayment}; 
use Illuminate\Support\Facades\Storage;


class FirstLetterController extends Controller
{

	public function show(Request $request,$id){
		//id - application is

        Session::put("fid", $id);
		$form = $a = Registration::findOrFail($id);

        $r=RegistrationApproval::where([
            'registration_id'=>$a->id,
            'registration_approval_stage_id'=>ApprovalService::$firstLetter
        ])->first();
        if ($r==null) {
            # code...
            abort(403, 'Application is not eligible for First letter Printing yet.'); 
     
        }
 

        return view("registrations::portfolio.firstletter", ['form_id'=>$id,'form'=>$form,'a'=>$a]);
 
		
	}
	public function update(Request $request,$id)
    {
    	if (!$request->has('type')) {
    		abort(403);
    	}


		# code...
		//$r=ApplicationPayment::where('registration_id',$id)->where('status','approved')->with('owner')->first();
		$r = Registration::findOrFail($id);

		//dd($r);
		if($r->owner==null){
			return back()->with('error','No First letter can be generated at the moment');
		}

		$t=PrvInsCategory::find($r->data['type_id']??0);

        // You can pass data to the view if needed
        $data = [
        	'name'=>$r->owner->name,
        	'id'=>$r->owner->id,
        	'email'=>$r->owner->email,
        	'phone'=>$r->owner->meta['phone']??'n/a',
        	'type'=>($r->data['sectionA']['proposed_name']??'').'<br/>'.$t->category_name??'n/a',
            'title' => 'First Letter of Approval',
            'payment_date'=>$r->created_at->toFormattedDateString(),
            'date' => now()->toFormattedDateString(),
            //'items'=>$r->payments->toArray()
        ];
		
		if($r!=null){
        // Load the view and pass data
        $pdf = Pdf::loadView('registrations::portfolio.template.firstletter', $data);
        
        // Option to stream or download the PDF
        return $pdf->download('firstletter.pdf');}else{
        	return back()->with('error','No First letter can be generated at the moment');
        }
	   	
	}


}