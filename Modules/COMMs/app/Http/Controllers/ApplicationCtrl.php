<?php
//ApplicationCtrl.php
namespace Modules\COMMs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Title,User};
use Hash;
use Modules\Proprietors\Models\Proprietor; 
use Illuminate\Support\Str;
use App\Mail\WelcomeProprietor;
use Illuminate\Support\Facades\Mail;

use App\Models\{PrvInsCategory,TRequirement};

use Illuminate\Support\Facades\Storage;
use App\Models\{City,Lga,SchoolSector};
use Modules\Proprietors\Models\{Application,ApplicationPayment,ApplicationComment};

class ApplicationCtrl extends Controller
{

	public function index(Request $request){

		$search = $request->input('search');

    $data['applications']= Application::with([ 'owner'])
        ->when($search, function ($query, $search) {
            $query->whereHas('category', function ($q) use ($search) {
                $q->where('category_name', 'like', "%{$search}%");
            })->orWhereHas('owner', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhere('meta->proposed_name', 'like', "%{$search}%");
        })
        ->where('current_reviewer_role','comm')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

		//$data['applications']=Application::where('current_reviewer_role','comm')->with('owner')->paginate(10);

        return view('comms::applications.index')->with($data);
	}

	public function show(Request $request,$id){
		$application=Application::findOrFail($id);

		$application->load('applicationStatus','remarks.reviewer');

		if ($application->current_reviewer_role!='COMM') {
			# code... 
			return redirect(route('dg.applications.index'))->with('error','You can\'t make further adjustments at the moment');
		}

		$m=$application->meta??[];

		$category=PrvInsCategory::find($m['type_id']??0); 

		$commData=$m['comm']??[];

		$cData=$m['cie']??[];
        return view('comms::applications.show',compact('cData','application','category','commData'));
	}

	public function store(Request $request){

		$x=$request->except('_token');
		//dd($x);


		$validated = $request->validate([
			'notes' => 'required',
			'proceed' => 'required',
	        //'docs' => 'required|array|min:1',
	        //'docs.*' => 'file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048', // 2MB max per file
	    ]);

	    $id=$request->application_id;

		$application=Application::findOrFail($id);
		if ($application->current_reviewer_role!='COMM') {
			# code... 
			return back()->with('error','You can\'t make further adjustments at the moment');
		}

	    // Step 2: Store uploaded files
	    /*$storedFiles = [];

	    if ($request->has('docs')) {
	    	# code...
	    foreach ($request->file('docs') as $file) {
	        $path = $file->store('attachments', 'public'); // saves to storage/app/public/attachments
	        $storedFiles[] = $path; // Save the path to store in DB or return
	    } 
	    }*/


		$m=$application->meta??[];
		$cData=$m['comm']??[];
		$v=[...$cData,...$x];

		/*$idocs=$v['docs']??[];
		$docs=array_merge($idocs,$storedFiles);
		$v['docs']=$docs;*/


		$m['comm']=$v;
		$application->meta=$m;


$comment=[
        'application_id'=>$application->id,
        'reviewer_id'=>$request->user()->id,
        //'status'=>$request->proceed??'',
        'meta'=>['notes'=>$request->notes??''],
        'reviewer_role'=>'COMM',
        'application_status_id'=>11,
    ];
//ApplicationComment::create($comment);

if ($request->proceed=="approve") {
	# code...
	    $application->current_reviewer_role="proprietor";
	    $application->current_application_status_id="13";
$comment['status']="approved";
}else{
	
	    $comment['status']="rejected";
}
ApplicationComment::create($comment);
		$application->save();
 
    	return back()->with('success', 'Saved successfully!');
	}
 


}