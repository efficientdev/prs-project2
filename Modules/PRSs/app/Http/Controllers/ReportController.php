<?php

namespace Modules\PRSs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{PrvInsCategory,TRequirement};
use Modules\Registrations\Models\Registration;

use Modules\Registrations\Models\{RegistrationApproval,RegistrationApprovalStage};
use Modules\Registrations\Services\ApprovalService;

class ReportController extends Controller
{
	/**
     * Display a listing of the resource.
     */
    public function show($id)
    { 

        $report=$registration=Registration::findOrFail($id);
        if (isset($registration->prs_4_report)) {
            # code...
        }

         $data=$registration->prs_4_report??[];
        $pdata=$registration->data??[];
        $prss_reports=$registration->prss_reports??[];

        //$data['teacher_qualifications']=$prss_reports['sectionC']['teacher_qualifications']??[];
        //$data['levels']=$prss_reports['sectionC']['levels']??[];

    	
        return view('prss::summary',compact('report'));
    }

}