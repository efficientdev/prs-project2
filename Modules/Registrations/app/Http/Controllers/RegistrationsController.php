<?php

namespace Modules\Registrations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Registrations\Models\Registration;
class RegistrationsController extends BaseSectionController
{
    public function show($form_id)
    {
    	//dd($form_id);
        $application = Registration::findOrFail($form_id);
        //dd($application);

        $application->load('registrationPayment','approvedRegistrationPayment');

    //public function show(Registration $application)
    //{
        return view('registrations::registration.show', compact('application'));
    }
       
}
 