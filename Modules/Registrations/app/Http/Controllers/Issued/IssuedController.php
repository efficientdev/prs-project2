<?php
//ReceiptsController.php 
namespace Modules\Registrations\Http\Controllers\Issued;

use Modules\Registrations\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Title,User};
use Hash; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail;

use App\Models\{PrvInsCategory,TRequirement};
use Modules\Proprietors\Models\{Application,ApplicationPayment}; 
use Illuminate\Support\Facades\Storage;


class IssuedController extends Controller
{

	public function show(Request $request,$id){
		//id - application is
$form = $a = Registration::findOrFail($id);


        Session::put("fid", $id);

	$form_id=$id;
        return view("registrations::portfolio.index", compact('form','form_id'));
        //return view("registrations::portfolio.index", ['form_id'=>$id,'form'=>$form]);

	}


}