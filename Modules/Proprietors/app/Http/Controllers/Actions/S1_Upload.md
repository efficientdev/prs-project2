<?php
//ApplicationSummaryCtrl.php
namespace Modules\Proprietors\Http\Controllers\Actions;

use Modules\Proprietors\Http\Controllers\Actions\BaseCtrl
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

class S1_Upload extends BaseCtrl
{
	public function index(Request $request){

		$application=Application::where('owner_id',$request->user()->id)->with('progress')->first();

		$data['uploadsList']=$this-> getUploadsList($application);
		  

        return view('proprietors::s1.index', $data);
	}
}