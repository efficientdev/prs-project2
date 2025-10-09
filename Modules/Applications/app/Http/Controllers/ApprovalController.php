<?php

namespace Modules\Applications\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Applications\Models\Application;
use Modules\Applications\Models\ApplicationApproval;
use Modules\Applications\Models\ApprovalStage;
use Modules\Applications\Services\ApprovalService;
 

class ApprovalController extends Controller
{
    public function myApprovals()
    {

        /*$approvals = ApplicationApproval::with('application', 'stage')
            ->whereHas('stage.users', fn($q) => $q->where('user_id', auth()->id()))
            ->where('status', 'pending')
            ->paginate(10);*/

        $approvals = ApplicationApproval::with('application', 'stage')
            ->where('status', 'pending')
            ->whereHas('stage', function ($q) {
                $q->where('role_name', auth()->user()->roles->pluck('name'));
            })
            ->paginate(10);


        return view('applications::approvals.index', compact('approvals'));
    }

    public function show(ApplicationApproval $approval)
    {
        $approval->load('application');
        $application=$approval->application;
        return view('applications::approvals.show', compact('approval','application'));
    }
/*
    public function approve(Request $request, ApplicationApproval $approval)
    {
        (new ApprovalService)->approve($approval, auth()->user(), $request->input('comments'));
        return redirect()->route('approvals.my')->with('success', 'Approved successfully.');
    }

    public function reject(Request $request, ApplicationApproval $approval)
    {
        (new ApprovalService)->reject($approval, auth()->user(), $request->input('comments'));
        return redirect()->route('approvals.my')->with('error', 'Rejected.');
    }
*/
     
    public function requestApplicantInput(Request $request, $approvalId)
{


    $approval = ApplicationApproval::findOrFail($approvalId);
    if (!auth()->user()->hasRole($approval->stage->role_name) || auth()->user()->hasRole('adm')) {
        abort(403, 'You are not allowed to approve this stage.');
    }

    //$this->authorize('approve', $approval);



    if ($approval->status !== 'pending') {
        return back()->with('error', 'Already processed');
    }

    (new ApprovalService)->requestApplicantInput($approval, auth()->user(), $request->comments);
    //approve($approval, auth()->user(), $request->comments);

    return back()->with('success', 'Application approved');
}

    public function approve(Request $request, $approvalId)
{


    $approval = ApplicationApproval::findOrFail($approvalId);
    if (!auth()->user()->hasRole($approval->stage->role_name) || auth()->user()->hasRole('adm')) {
        abort(403, 'You are not allowed to approve this stage.');
    }

    //$this->authorize('approve', $approval);


    if ($approval->status !== 'pending') {
        return back()->with('error', 'Already processed');
    }

    (new ApprovalService)->approve($approval, auth()->user(), $request->comments);

    return back()->with('success', 'Application approved');
}

public function reject(Request $request, $approvalId)
{
    $approval = ApplicationApproval::findOrFail($approvalId);

    if (!auth()->user()->hasRole($approval->stage->role_name) || auth()->user()->hasRole('adm')) {
        abort(403, 'You are not allowed to approve this stage.');
    }
    //$this->authorize('approve', $approval);


    if ($approval->status !== 'pending') {
        return back()->with('error', 'Already processed');
    }

    (new ApprovalService)->reject($approval, auth()->user(), $request->comments);

    return back()->with('success', 'Application rejected');
}

}
