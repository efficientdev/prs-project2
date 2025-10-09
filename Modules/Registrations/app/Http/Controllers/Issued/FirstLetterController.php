<?php
//FirstLetterController.php

namespace Modules\Registrations\Http\Controllers\Issued;

use Modules\Registrations\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Title,User};
use Hash; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail;

use Modules\Registrations\Services\ApprovalService;
use App\Models\{PrvInsCategory,TRequirement};
use Modules\Proprietors\Models\{Application,ApplicationPayment}; 
use Illuminate\Support\Facades\Storage;


class FirstLetterController extends Controller
{

	public function show(Request $request,$id){
		//id - application is

        Session::put("fid", $id);
$form = $a = Registration::findOrFail($id);

//ApprovalService::$onlyForProprietors


        return view("registrations::portfolio.index", ['form_id'=>$id,'form'=>$form]);
 
		
	}


}