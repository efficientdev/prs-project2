<?php
//ApplicationPaymentCtrl.php 
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

class S1_Upload extends Controller
{
	public function index(Request $request){

		$a=Application::where('owner_id',$request->user()->id)->with('progress')->first();
		  

        return view('proprietors::summary.index', compact('application','cities','lgas','category','school_sectors'));
	}
}