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

use App\Models\{City,Lga,SchoolSector};
use Modules\Proprietors\Models\{Application,ApplicationPayment};

use Modules\Registrations\Models\Registration;

class ApplicationTypeCtrl extends Controller
{

	public function index(Request $request){
		$data['cats']=PrvInsCategory::all();
		//$data['my_applications']=Application::where('owner_id',$request->user()->id)->with('applicationStatus','latestApprovalPayment')->get();

        return view('proprietors::applicationtypes.index')->with($data);
	}


	public function show(Request $request,$id){

		$data['v3']=PrvInsCategory::find($id); 
		$data['id']=$id;

		$data['location']=['temporary','permanent','lease'];
        //1
        $data['reqs']=TRequirement::where('visible_in_t'.$id,1)->select('requirement_name','visible_in_t'.$id,'t'.$id.'_note AS note')->get();  

        $data['tabslist']=[
        	//'Pending Tasks',
        	'Requirements'];


		$a=Registration::where('owner_id',$request->user()->id)
		//->where('current_application_status_id',1)
		//->where('meta->type_id',$id)
		//->with('applicationPayments')
		->first();
		if ($a==null) {
			# code...
			/*$a=Registration::create([
		        'owner_id'=>$request->user()->id,
		        'meta'=>[
		        	'type_id'=>$id,
			        //'location_is'=>$request->location,
			        //'fee'=>$application_fee,
			        //'applicable_charge'=>$charge,
			    ], 
		    ]);*/
		}else{
//dd($a);
			if ($a->data['type_id']!=$id) {
				# code...
				$data['v3']=PrvInsCategory::find($a->data['type_id']); 
		

	        	return view('proprietors::applicationtypes.deleteold')->with($data);

			}
		}
		$data['a']=$a;

 

        return view('proprietors::applicationtypes.show')->with($data);
	}

	public function show1(Request $request,$id){

		$data['v3']=PrvInsCategory::find($id); 
		$data['id']=$id;

		$data['location']=['temporary','permanent','lease'];
        //1
        $data['reqs']=TRequirement::where('visible_in_t'.$id,1)->select('requirement_name','visible_in_t'.$id,'t'.$id.'_note AS note')->get();  

        $data['tabslist']=[
        	//'Pending Tasks',
        	'Requirements'];


		$a=Application::where('owner_id',$request->user()->id)
		//->where('current_application_status_id',1)
		//->where('meta->type_id',$id)
		->with('applicationPayments')
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
		}else{
//dd($a);
			if ($a->meta['type_id']!=$id) {
				# code...
				$data['v3']=PrvInsCategory::find($a->meta['type_id']); 
		

	        	return view('proprietors::applicationtypes.deleteold')->with($data);

			}
		}
		$data['a']=$a;


$cYear=$a->created_at->format('Y')??date('y');
$data['uploadsList']=[
    'Tax Clearance Certificate for '.($cYear-3),
    'Tax Clearance Certificate for '.($cYear-2),
    'Tax Clearance Certificate for '.($cYear-1),
    'Evidence of school land ownership',
    'A statement of means for financing the school',
    "A copy of the school’s Prospectus",
    "The master or building Plan for the School Buildings"
]; 


        return view('proprietors::applicationtypes.show')->with($data);
	}

	public function delete(Request $request,$id){
		Application::where('owner_id',$request->user()->id)
		//->where('current_application_status_id',1)
		->where('meta->type_id',$id)->delete();

	    return back()->with('success', 'Application Deleted successfully.');
	}


}
