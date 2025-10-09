<?php
//StartApprovalCtrl.php 

namespace Modules\Proprietors\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Title,User};
use Hash;
use Modules\Proprietors\Models\Proprietor; 
use Illuminate\Support\Str;
use App\Mail\WelcomeProprietor;
use Illuminate\Support\Facades\Mail;

use App\Models\{PrvInsCategory,TRequirement};
use Modules\Proprietors\Models\{Application,ApprovalPayment};

class StartApprovalCtrl extends Controller
{


//getpayinfo StartApprovalCtrl
	//public function update(Request $request,$id){
	public function getpayinfo(Request $request){


		$request->validate([
            //'payment_type' => 'required|in:bank,online',
            'id' => 'required', 
        ]);
		//
		$id=$request->id;

		$a=Application::where('current_application_status_id',13)
		->where('owner_id',$request->user()->id)
		->where('id',$id) 
		->with('applicationPayments','latestApprovalPayment')
		->first(); 
		
		if ($a!=null) { 
			$data['v3']=$a->category; 
			$application_fee=$data['v3']->category_app_fee??30000;


			$charge=(((1.52/100)*$application_fee)+100);
			if ($charge>2500) {
				$charge=2500;
			}

			/*$a=Application::create([
		        'owner_id'=>$request->user()->id,
		        'meta'=>[
		        	'type_id'=>$id,
			        'location_is'=>$request->location,
			        'fee'=>$application_fee,
			        'applicable_charge'=>$charge,
			    ],
		        'current_application_status_id'=>1,
		        'current_reviewer_role'=>'dfa'
		    ]);*/
		    try {

		    	if($a->latestApprovalPayment==null){
		    	
				    ApprovalPayment::create([
				    	'application_id'=>$a->id,
				    	'meta'=>[
				        	'type_id'=>$id,
					        'location_is'=>$request->location??'',
					        'fee'=>$application_fee,
					        'applicable_charge'=>$charge,
					    ],
					    'user_id'=>$request->user()->id
				    ]);

				}

		    } catch (\Exception $e) {
		    	
		    }
		}
 
		$data['a']=$a;

		//dd($a2);
		$ca=$a->latestApprovalPayment;
		//dd($ca);
		$data['type']='approval';//important
		$data['ownerId']=$ca->id;

        return view('proprietors::application.pay')->with($data);
	}



}