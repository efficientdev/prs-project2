<?php

namespace Modules\Applications\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use Modules\Applications\Models\ApplicationApproval;
use App\Models\User;

class ApplicationApprovalPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct() {}
    
    public function approve(User $user, ApplicationApproval $approval)
{
    return $approval->stage->users->contains($user);
}

}
