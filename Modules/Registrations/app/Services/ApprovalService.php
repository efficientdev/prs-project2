<?php

namespace Modules\Registrations\Services;

//namespace App\Services;
use Modules\Proprietors\Models\ApprovalPayment;
use Modules\Registrations\Models\Application;
use Modules\Registrations\Models\RegistrationApproval;
use Modules\Registrations\Models\RegistrationApprovalStage;
use Carbon\Carbon;
use App\Notifications\ApplicationApproved;
use App\Models\User;
use Modules\Applications\Notifications\{ApplicantInputRequested,ApplicationStatusUpdated,ApplicationRestarted,ApplicationRejected};

class ApprovalService
{
    public static $siteName = "MyWebsite";
    public static $firstLetter = 7;
    public static $onlyForProprietors=[7];

    public static function finalApproval($approvalpayment,$user){

        //
        try {
                    
            //school is completely approved
            $owner = ApprovalPayment::findOrFail($approvalpayment);

            $r=RegistrationApproval::where([
                'registration_id'=>$owner->registration_id,
                'registration_approval_stage_id'=>ApprovalService::$firstLetter
            ])->first();
            if($r->status=="pending"){
                $r->update([
                    'status'=>'approved'
                ]);
                //$owner->status
                // Assuming $user is the User model of the approved applicant
                $u=User::find($user->id);
                $u->notify(new ApplicationApproved($user->name));


// Assuming $user is the User model of the approved applicant
//$user->notify(new ApplicationApproved($user->name));

            }
        } catch (\Exception $e) {
            dd($e);
        }

    }

    public function requestApplicantInput(RegistrationApproval $approval, User $officer, $comments)
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

    public function approve(RegistrationApproval $approval, $user, $comments = null)
    {
        $approval->update([
            'status' => 'approved',
            'user_id' => $user->id,
            'comments' => $comments,
            'decision_at' => Carbon::now(),
        ]);

        $application=$approval->application;
        

        // Get next stage
        $nextStage = RegistrationApprovalStage::where('order', '>', $approval->stage->order)
            ->orderBy('order')
            ->first();

        if ($nextStage) {
            RegistrationApproval::create([
                'registration_id' => $approval->registration_id,
                'registration_approval_stage_id' => $nextStage->id,
                'status' => 'pending',
            ]);
        } else {
            // Final approval
            $approval->application->update(['status' => 'approved']);
        }

        if(isset($application->owner)){
            try {
                
                $application->owner->notify(new ApplicationStatusUpdated($application, 'approved'));
            } catch (\Exception $e) {
                //dd($e);
            }
        }

    }



    public function reject1(RegistrationApproval $approval, $user, $comments = null)
    {
        $approval->update([
            'status' => 'rejected',
            'user_id' => $user->id,
            'comments' => $comments,
            'decision_at' => Carbon::now(),
        ]);

        $approval->application->update(['status' => 'rejected']);
    }
    public function reject(RegistrationApproval $approval, User $officer, $comments)
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


        if(isset($application->owner)){
            try {
                
        // Optionally notify applicant about restart
        $application->owner->notify(new ApplicationRestarted($application));
            } catch (\Exception $e) {
                
            }
        }
    } else {
        // Mark application as rejected permanently
        $application->update(['status' => 'rejected']);

        

        if(isset($application->owner)){
            try {
                
        // Optionally notify applicant about final rejection
        $application->owner->notify(new ApplicationRejected($application));
            } catch (\Exception $e) {
                
            }
        }
    }
}

protected function shouldRollbackOnRejection(RegistrationApproval $approval)
{
    // Define logic:
    // e.g., some stages allow rollback, others reject permanently
    $rollbackStages = ['initial-reviewer', 'supervisor']; // role_names that allow rollback

    return in_array($approval->stage->role_name, $rollbackStages);
}

protected function getInitialStageId()
{
    return RegistrationApprovalStage::orderBy('order')->first()->id;
}

protected function resetApprovalsFromStage(Application $application, $stageId)
{
    // Delete approvals at or after rollback stage
    RegistrationApproval::where('registration_id', $application->id)
        ->whereHas('stage', function ($q) use ($stageId) {
            $rollbackOrder = RegistrationApprovalStage::find($stageId)->order;
            $q->where('order', '>=', $rollbackOrder);
        })->delete();

    // Create a new approval record at rollback stage
    RegistrationApproval::create([
        'registration_id' => $application->id,
        'registration_approval_stage_id' => $stageId,
        'status' => 'pending',
    ]);
}

}
