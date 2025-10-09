<?php

namespace Modules\Registrations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Registrations\Models\Application;
use Modules\Registrations\Models\RegistrationApproval;
use Modules\Registrations\Models\RegistrationApprovalStage;
use Modules\Registrations\Services\ApprovalService;
 

class ApprovalController extends Controller
{
    public function myApprovals()
    {

        /*$approvals = RegistrationApproval::with('application', 'stage')
            ->whereHas('stage.users', fn($q) => $q->where('user_id', auth()->id()))
            ->where('status', 'pending')
            ->paginate(10);*/

        $approvals = RegistrationApproval::with('application', 'stage')
            ->whereNotIn('registration_approval_stage_id',ApprovalService::$onlyForProprietors)
            ->where('status', 'pending')
            ->whereHas('stage', function ($q) {
                if (!in_array('ADM', auth()->user()->roles->pluck('name')->toArray())) {
                $q->where('role_name', auth()->user()->roles->pluck('name'));
                }

            })
            ->paginate(10);


        return view('registrations::approvals.index', compact('approvals'));
    }

    public function show(RegistrationApproval $approval)
    {
        $approval->load('application.approvals');
        //Registrations::where('')->with('approvals')->first();
        $application=$approval->application;
        return view('registrations::approvals.show', compact('approval','application'));
    }
/*
    public function approve(Request $request, RegistrationApproval $approval)
    {
        (new ApprovalService)->approve($approval, auth()->user(), $request->input('comments'));
        return redirect()->route('srapprovals.my')->with('success', 'Approved successfully.');
    }

    public function reject(Request $request, RegistrationApproval $approval)
    {
        (new ApprovalService)->reject($approval, auth()->user(), $request->input('comments'));
        return redirect()->route('srapprovals.my')->with('error', 'Rejected.');
    }
*/
     
    public function requestApplicantInput(Request $request, $approvalId)
{


    $approval = RegistrationApproval::findOrFail($approvalId);
    if (!auth()->user()->hasRole($approval->stage->role_name) && !auth()->user()->hasRole('ADM')) {
        abort(403, 'You are not allowed to approve this stage.');
    }

    //$this->authorize('approve', $approval);



    if ($approval->status !== 'pending') {
        return back()->with('error', 'Already processed');
    }

    (new ApprovalService)->requestApplicantInput($approval, auth()->user(), $request->comments);
    //approve($approval, auth()->user(), $request->comments);

    //return back()->with('success', 'Application approved');
    return redirect()->route('srapprovals.my')
            ->with('success', 'Application Queried');
}

    public function approve(Request $request, $approvalId)
{


    $approval = RegistrationApproval::findOrFail($approvalId);
    if (!auth()->user()->hasRole($approval->stage->role_name) && !auth()->user()->hasRole('ADM')) {
        abort(403, 'You are not allowed to approve this stage.');
    }

    //$this->authorize('approve', $approval);


    if ($approval->status !== 'pending') {
        return back()->with('error', 'Already processed');
    }

    //

        

    (new ApprovalService)->approve($approval, auth()->user(), $request->comments);
    return redirect()->route('srapprovals.my')
            ->with('success', 'Application approved');
    //return back()->with('success', 'Application approved');
}

public function reject(Request $request, $approvalId)
{
    $approval = RegistrationApproval::findOrFail($approvalId);

    if (!auth()->user()->hasRole($approval->stage->role_name) && !auth()->user()->hasRole('ADM')) {
        abort(403, 'You are not allowed to approve this stage.');
    }
    //$this->authorize('approve', $approval);


    if ($approval->status !== 'pending') {
        return back()->with('error', 'Already processed');
    }

    (new ApprovalService)->reject($approval, auth()->user(), $request->comments);

    return redirect()->route('srapprovals.my')
            ->with('error', 'Application rejected');
    //return back()->with('success', 'Application rejected');
}

}
