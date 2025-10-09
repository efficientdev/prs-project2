<?php

namespace Modules\Applications\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Applications\Database\Factories\ApplicationFactory;

class Application extends Application1
{
    //use HasFactory;

    public $table='application1s';

    /**
     * The attributes that are mass assignable.
     */

   /* protected $fillable = ['title', 'description', 'status'];

    public function approvals()
    {
        return $this->hasMany(ApplicationApproval::class);
    }

    public function currentApproval()
    {
        return $this->approvals()->where('status', 'pending')->orderBy('approval_stage_id')->first();
    } 
 

	public function currentStage() {
	    return $this->approvals()->whereNull('decision_at')->orderBy('stage_order')->first();
	}*/


    // protected static function newFactory(): ApplicationFactory
    // {
    //     // return ApplicationFactory::new();
    // }
}
