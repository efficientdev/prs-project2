<?php
//ApplicationSummaryCtrl.php
namespace Modules\Proprietors\Http\Controllers\Actions;

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

class BaseCtrl extends Controller
{
	public function getUploadsList($a){

		$cYear=$a->created_at->format('Y')??date('y');
		//$data['uploadsList']
		$uploadsList=[
		    'Tax Clearance Certificate for '.($cYear-3),
		    'Tax Clearance Certificate for '.($cYear-2),
		    'Tax Clearance Certificate for '.($cYear-1),
		    'Evidence of school land ownership',
		    'A statement of means for financing the school',
		    "A copy of the school’s Prospectus",
		    "The master or building Plan for the School Buildings"
		]; 
		return $uploadsList;
	}
	public function index(Request $request){

		$a=Application::where('owner_id',$request->user()->id)->with('progress')->first();
		  

        return view('proprietors::summary.index', compact('application','cities','lgas','category','school_sectors'));
	}
}