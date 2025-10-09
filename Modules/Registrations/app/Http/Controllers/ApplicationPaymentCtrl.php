<?php
//ApplicationPaymentCtrl.php

namespace Modules\Registrations\Http\Controllers;

use Modules\Registrations\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Title,User};
use Hash; 
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail;

use App\Models\{PrvInsCategory,TRequirement};
use Modules\Proprietors\Models\{Application,ApplicationPayment}; 
use Illuminate\Support\Facades\Storage;

use Modules\Registrations\Models\Registration;

class ApplicationPaymentCtrl extends Controller
{

	


	public function edit(Request $request,$id){




		$a=Registration::where('owner_id',$request->user()->id)
		//->where('current_application_status_id',1)
		->where('data->type_id',$id)
		->first();
		if ($a==null) { 
			abort(403,"something went wrong");
		}

			$data['v3']=PrvInsCategory::find($a->data['type_id']); 

			$application_fee=$data['v3']->category_app_fee??30000;


			$charge=(((1.52/100)*$application_fee)+100);
			if ($charge>2500) {
				$charge=2500;
			}


			$apps=Registration::where(['owner_id'=>$request->user()->id])->count();
			if ($apps>0) { 

			    return back()->with('error', 'Only 1 Application is allowed per account.');

			}

			$data=$a->data??[];
			$ndata=[...$data,
		        	'type_id'=>$id,
			        'location_is'=>$request->location,
			        'fee'=>$application_fee,
			        'applicable_charge'=>$charge,
			    ];
			$a->data=$ndata;
 
		    ApplicationPayment::create([
		    	'registration_id'=>$a->id,
		    	'data'=>[
		        	'type_id'=>$id,
			        'fee'=>$application_fee,
			        'applicable_charge'=>$charge,
			    ],
			    'user_id'=>$request->user()->id
		    ]);
		//}

		$a2=Registration::find($a->id);
		$a2->load('applicationPayments','latestApplicationPayment');
		$data['a']=$a2;

		//dd($a2);

		$data['type']='application';//important
		$data['ownerId']=$a2->latestApplicationPayment->id;

        return view('registration::application.pay')->with($data);
	}

}