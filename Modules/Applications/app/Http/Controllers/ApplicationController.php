<?php

namespace Modules\Applications\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Applications\Models\Application;
use Modules\Applications\Models\ApplicationApproval;
use Modules\Applications\Models\ApprovalStage;
use Modules\Applications\Services\ApprovalService;

class ApplicationController extends Controller 
{
    public function index()
    {
        $applications = Application::with('approvals.stage', 'approvals.user')->paginate(10);
        return view('applications::applications.index', compact('applications'));
    }

    public function create()
    {
        return view('applications::applications.create');
    }
    public function resubmit(Request $request, Application $application)
{
    if ($application->status !== 'in_progress') {
        abort(403, 'Application is not eligible for resubmission.');
    }

    // Update application details from applicant input here...

    return redirect()->route('applications.show', $application)->with('success', 'Application resubmitted.');
}


    public function store(Request $request)
    {
        $application = Application::create($request->only('title', 'description'));

        $initialStage = ApprovalStage::orderBy('order')->first();

        ApplicationApproval::create([
            'application1_id' => $application->id,
            'approval_stage_id' => $initialStage->id,
        ]);

        return redirect()->route('applications.index')->with('success', 'Application submitted!');
    }

    public function show(Application $application)
    {
        return view('applications::applications.show', compact('application'));
    }
}

