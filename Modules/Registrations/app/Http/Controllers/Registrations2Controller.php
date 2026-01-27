<?php

namespace Modules\Registrations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Registrations\Models\Registration;
class Registrations2Controller //extends BaseSectionController
{
    public function show($form_id)
    {
    	//dd($form_id);
        $application = Registration::findOrFail($form_id);
        //dd($application);

        $application->load('registrationPayment','approvedRegistrationPayment','approvals');  

    //public function show(Registration $application)
    //{
        return view('registrations::registration.show2', compact('application'));
    }
       
}
 