<?php
//ApprovedCtrl.php 
namespace Modules\Registrations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Registrations\Models\Application;
use Modules\Registrations\Models\RegistrationApproval;
use Modules\Registrations\Models\RegistrationApprovalStage;
use Modules\Registrations\Services\ApprovalService;
 
use App\Models\{Category,Lga,Ward};

class ApprovedCtrl extends Controller
{
    public function index()
    { 
        // Get next stage
        $lastStage = RegistrationApprovalStage::orderBy('order','desc')
            ->first();


        $approvals = RegistrationApproval::with('application', 'stage')
            ->whereNotIn('registration_approval_stage_id',$lastStage->id)
            ->with('approvedApprovalPayment')
            ->where('status', 'approved')
            ->paginate(10); 

        return view('registrations::approved.index', compact('approvals'));

    }
    
    public function show(RegistrationApproval $approval)
    {
 

        $approval->load('application.approvals');
        //Registrations::where('')->with('approvals')->first();
        $application=$approval->application;
        return view('registrations::approved.show', compact('approval','application'));
    }

}
