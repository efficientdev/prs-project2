<?php
//RedirectService.php  
namespace App\Services;
use Illuminate\Support\Facades\Session;

//use App\Services\RedirectService;
class RedirectService
{
	/*this class uses the ref of paymentsto store the redirection path*/
	public function push($ref,$route){

        Session::put($ref, $form_id);
	}
	public function pull(){
		return Session::get("fid", 'default');
	}

}