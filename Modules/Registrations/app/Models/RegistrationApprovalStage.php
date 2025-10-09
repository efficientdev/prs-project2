<?php

namespace Modules\Registrations\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Registrations\Database\Factories\RegistrationApprovalStageFactory;

use App\Models\User;
class RegistrationApprovalStage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'order', 'role_name'];
	    
	// RegistrationApprovalStage.php
	public function users() {
	    return $this->belongsToMany(User::class); // Officers who can approve at this stage
	}

    // protected static function newFactory(): RegistrationApprovalStageFactory
    // {
    //     // return RegistrationApprovalStageFactory::new();
    // }
}
