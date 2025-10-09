<?php

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
use Modules\Proprietors\Models\{Application,ApplicationPayment};

class StartApplicationCtrl extends Controller
{
//AppCtrl.php

	public function index(Request $request){
		$data['cats']=PrvInsCategory::all();
		$data['my_applications']=Application::where('owner_id',$request->user()->id)->with('applicationStatus','latestApprovalPayment')->get();

        return view('proprietors::application.index')->with($data);
	}
	public function show(Request $request,$id){

		$data['v3']=PrvInsCategory::find($id); 
		$data['id']=$id;

		$data['location']=['temporary','permanent','lease'];
        //1
        $data['reqs']=TRequirement::where('visible_in_t'.$id,1)->select('requirement_name','visible_in_t'.$id,'t'.$id.'_note AS note')->get();  


		$a=Application::where('owner_id',$request->user()->id)
		->where('current_application_status_id',1)
		->where('meta->type_id',$id)->with('applicationPayments')
		->first();
		if ($a==null) {
			# code...
			$a=Application::create([
		        'owner_id'=>$request->user()->id,
		        'meta'=>[
		        	'type_id'=>$id,
			        //'location_is'=>$request->location,
			        //'fee'=>$application_fee,
			        //'applicable_charge'=>$charge,
			    ],
		        'current_application_status_id'=>100,
		        'current_reviewer_role'=>'proprietor'
		    ]);
		}
		$data['a']=$a;


        return view('proprietors::application.show')->with($data);
	}
	public function update(Request $request,$id){

		$data['v3']=PrvInsCategory::find($id); 

		$a=Application::where('owner_id',$request->user()->id)
		->where('current_application_status_id',1)
		->where('meta->type_id',$id)
		->first();
		if ($a==null) { 
			dd("something went wrong");
		}
			$application_fee=$data['v3']->category_app_fee??30000;


			$charge=(((1.52/100)*$application_fee)+100);
			if ($charge>2500) {
				$charge=2500;
			}


			$apps=Application::where(['owner_id'=>$request->user()->id])->count();
			if ($apps>0) { 

			    return back()->with('error', 'Only 1 Application is allowed per account.');

			}

			$meta=$a->meta??[];
			$nmeta=[...$meta,
		        	'type_id'=>$id,
			        'location_is'=>$request->location,
			        'fee'=>$application_fee,
			        'applicable_charge'=>$charge,
			    ];
			$a->meta=$nmeta;

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

		    ApplicationPayment::create([
		    	'application_id'=>$a->id,
		    	'meta'=>[
		        	'type_id'=>$id,
			        'location_is'=>$request->location??'',
			        'fee'=>$application_fee,
			        'applicable_charge'=>$charge,
			    ],
			    'user_id'=>$request->user()->id
		    ]);
		//}

		$a2=Application::find($a->id);
		$a2->load('applicationPayments','latestApplicationPayment');
		$data['a']=$a2;

		//dd($a2);

		$data['type']='application';//important
		$data['ownerId']=$a2->latestApplicationPayment->id;

        return view('proprietors::application.pay')->with($data);
	}



}