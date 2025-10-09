<?php
//S2_SubmitApplication.php.php
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

class S2_SubmitApplication extends Controller
{


	public function edit(Request $request,$id){
		$application=Application::findOrFail($id);

		$m=$application->meta??[];

		$category=PrvInsCategory::find($m['type_id']??0); 

        $cities = collect(['' => 'Select City'] + City::pluck('city_name','city_id')->all()??[])->toArray();
        $lgas   = collect(['' => 'Select LGA'] + Lga::pluck('lga_name','lga_id')->all()??[])->toArray();
        $school_sectors   = collect(['' => 'Select School Sector'] + SchoolSector::pluck('school_sector_name','school_sector_id')->all()??[])->toArray();
        //
  
        return view('proprietors::application.create', compact('application','cities','lgas','category','school_sectors'));

	}

	public function store(Request $request)
	{

	    $a=Application::findOrFail($request->application_id);
	    if ($a->current_application_status_id!="0") {
	    	# code...
	    	return redirect(route('application.types.index'))->with(['error'=>'This Application is been processed.']);
	    }
	    $request->validate([
	        'application_id' => 'required',
	        'nearby_school' => 'required|array|min:2',
	        'nearby_school.*' => 'required|string|max:255',
	        'nearby_distance' => 'required|array|min:2',
	        'nearby_distance.*' => 'required|string|max:255', 

	        'staff_surname' => 'required|array|min:1',
	        'staff_surname.*' => 'required|string|max:255',

	        'staff_other_names' => 'required|array|min:1',
	        'staff_other_names.*' => 'required|string|max:255',

	        'staff_qualification' => 'required|array|min:1',
	        'staff_qualification.*' => 'required|string|max:255',
	    ]);

	    $m=$a->meta??[];
	    $m2=$request->except('_token');

	    $proprietor=$m['proprietor']??[];
	    $v=[...$proprietor,...$m2];
	    $m['proprietor']=$v;


	    $a->current_reviewer_role="cie";
	    $a->current_application_status_id="5";

	    $a->meta=$m;
	    $a->save();


	    return redirect(route('application.types.show',['application_type'=>$a->id]))->with(['success'=>'This Application has been submitted.']);


	}

	public function show(Request $request,$id)
	{ 
	    $application=Application::findOrFail($id);

	    //dd($a);

        return view('proprietors::application.showsummary', compact('application'));

	}




}