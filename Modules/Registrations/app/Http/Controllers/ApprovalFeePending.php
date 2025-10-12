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

class ApprovalFeePending extends Controller
{
    public function index()
    {
    	/*where('order', '>', $approval->stage->order)
            ->*/

        // Get next stage
        $lastStage = RegistrationApprovalStage::orderBy('order','desc')
            ->first();


        $approvals = RegistrationApproval::with('application', 'stage')
            //->whereNotIn('registration_approval_stage_id',$lastStage->id)
            ->where('registration_approval_stage_id',$lastStage->id)
            ->with('approvedApprovalPayment')
            ->where('status', 'pending')
            ->paginate(10);
        /*
            ->whereHas('approvedRegistrationPayment')
            ->whereHas('stage', function ($q) {
                if (!in_array('ADM', auth()->user()->roles->pluck('name')->toArray())) {
                $q->where('role_name', auth()->user()->roles->pluck('name'));
                }

            })*/


        return view('registrations::approved.index_pending', compact('approvals'));

    }

    public function show(RegistrationApproval $approval)
    {
 

        $approval->load('application.approvals');
        //Registrations::where('')->with('approvals')->first();
        $application=$approval->application;
        return view('registrations::approved.show', compact('approval','application'));
    }

}
