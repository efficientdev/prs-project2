<?php

namespace Modules\Registrations\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Registrations\Database\Factories\RegistrationApprovalFactory;

use Modules\Proprietors\Models\{ApprovalPayment,ApplicationPayment}; 
use App\Models\User;
class RegistrationApproval extends Model
{
    use HasFactory;

    /** 
     * The attributes that are mass assignable.
     */ 
    
    protected $fillable = ['registration_id', 'registration_approval_stage_id', 'user_id', 'status', 'comments', 'decision_at'];


    public function approvedRegistrationPayment()
    {
        return $this->hasOne(ApplicationPayment::class,'registration_id', 'registration_id')->where('status','approved');
    }

    public function approvedApprovalPayment()
    {
        return $this->hasOne(ApprovalPayment::class,'registration_id', 'registration_id')->where('status','approved');
    }

    public function application()
    {
        return $this->belongsTo(Registration::class,'registration_id','id');
    }

    public function stage()
    {
        return $this->belongsTo(RegistrationApprovalStage::class, 'registration_approval_stage_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // RegistrationApproval.php
	public function stage2() {
	    return $this->belongsTo(RegistrationApprovalStage::class);
	} 


    // protected static function newFactory(): RegistrationApprovalFactory
    // {
    //     // return RegistrationApprovalFactory::new();
    // }
}
