<?php

namespace Modules\Applications\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Applications\Database\Factories\ApplicationApprovalFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\User;

class ApplicationApproval extends Model
{
    use HasFactory;
    /*use LogsActivity;

    protected static $logAttributes = ['status', 'comments', 'user_id'];
    protected static $logName = 'application_approval';
*/
    /**
     * The attributes that are mass assignable.
     */

    protected $fillable = ['application1_id', 'approval_stage_id', 'user_id', 'status', 'comments', 'decision_at'];

    public function application()
    {
        return $this->belongsTo(Application::class,'application1_id','id');
    }

    public function stage()
    {
        return $this->belongsTo(ApprovalStage::class, 'approval_stage_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // ApplicationApproval.php
public function stage2() {
    return $this->belongsTo(ApprovalStage::class);
} 


    // protected static function newFactory(): ApplicationApprovalFactory
    // {
    //     // return ApplicationApprovalFactory::new();
    // }
}
