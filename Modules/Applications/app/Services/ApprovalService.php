<?php

namespace Modules\Applications\Services;

//namespace App\Services;

use Modules\Applications\Models\Application;
use Modules\Applications\Models\ApplicationApproval;
use Modules\Applications\Models\ApprovalStage;
use Carbon\Carbon;

class ApprovalService
{
    public function requestApplicantInput(ApplicationApproval $approval, User $officer, $comments)
{
    $approval->update([
        'status' => 'needs_applicant_input',
        'user_id' => $officer->id,
        'comments' => $comments,
        'decision_at' => now(),
    ]);

    $approval->application->update(['status' => 'in_progress']);

    // Optionally: notify applicant
    $approval->application->user->notify(new ApplicantInputRequested($approval));
}

    public function approve(ApplicationApproval $approval, $user, $comments = null)
    {
        $approval->update([
            'status' => 'approved',
            'user_id' => $user->id,
            'comments' => $comments,
            'decision_at' => Carbon::now(),
        ]);

        $application=$approval->application;
        //$application->owner->notify(new ApplicationStatusUpdated($application, 'approved'));


        // Get next stage
        $nextStage = ApprovalStage::where('order', '>', $approval->stage->order)
            ->orderBy('order')
            ->first();

        if ($nextStage) {
            ApplicationApproval::create([
                'application1_id' => $approval->application1_id,
                'approval_stage_id' => $nextStage->id,
                'status' => 'pending',
            ]);
        } else {
            // Final approval
            $approval->application->update(['status' => 'approved']);
        }
    }



    public function reject1(ApplicationApproval $approval, $user, $comments = null)
    {
        $approval->update([
            'status' => 'rejected',
            'user_id' => $user->id,
            'comments' => $comments,
            'decision_at' => Carbon::now(),
        ]);

        $approval->application->update(['status' => 'rejected']);
    }
    public function reject(ApplicationApproval $approval, User $officer, $comments)
{
    $approval->update([
        'status' => 'rejected',
        'user_id' => $officer->id,
        'comments' => $comments,
        'decision_at' => now(),
    ]);

    $application = $approval->application;

    // Decide rollback or final rejection
    if ($this->shouldRollbackOnRejection($approval)) {
        // Rollback - restart from initial stage or a specific stage
        $rollbackStageId = $approval->rollback_stage_id ?? $this->getInitialStageId();

        // Reset all approvals after rollbackStageId or just create a new pending approval at rollback stage
        $this->resetApprovalsFromStage($application, $rollbackStageId);

        $application->update(['status' => 'in_progress']);

        // Optionally notify applicant about restart
        $application->user->notify(new ApplicationRestarted($application));
    } else {
        // Mark application as rejected permanently
        $application->update(['status' => 'rejected']);

        // Optionally notify applicant about final rejection
        $application->user->notify(new ApplicationRejected($application));
    }
}

protected function shouldRollbackOnRejection(ApplicationApproval $approval)
{
    // Define logic:
    // e.g., some stages allow rollback, others reject permanently
    $rollbackStages = ['initial-reviewer', 'supervisor']; // role_names that allow rollback

    return in_array($approval->stage->role_name, $rollbackStages);
}

protected function getInitialStageId()
{
    return ApprovalStage::orderBy('order')->first()->id;
}

protected function resetApprovalsFromStage(Application $application, $stageId)
{
    // Delete approvals at or after rollback stage
    ApplicationApproval::where('application1_id', $application->id)
        ->whereHas('stage', function ($q) use ($stageId) {
            $rollbackOrder = ApprovalStage::find($stageId)->order;
            $q->where('order', '>=', $rollbackOrder);
        })->delete();

    // Create a new approval record at rollback stage
    ApplicationApproval::create([
        'application1_id' => $application->id,
        'approval_stage_id' => $stageId,
        'status' => 'pending',
    ]);
}

}
