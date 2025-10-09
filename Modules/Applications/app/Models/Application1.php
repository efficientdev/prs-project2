<?php

namespace Modules\Applications\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Applications\Database\Factories\Application1Factory;

use App\Models\User;
 class Application1 extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'description', 'status'];

    public function approvals()
    {
        return $this->hasMany(ApplicationApproval::class,'application1_id');
    }

    public function currentApproval()
    {
        return $this->approvals()->where('status', 'pending')->orderBy('approval_stage_id')->first();
    } 
 

	public function currentStage() {
	    return $this->approvals()->whereNull('decision_at')->orderBy('stage_order')->first();
	}


    // protected static function newFactory(): Application1Factory
    // {
    //     // return Application1Factory::new();
    // }
}
