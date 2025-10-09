<?php

namespace Modules\Applications\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Applications\Database\Factories\ApprovalStageFactory;

use App\Models\User;
class ApprovalStage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */ 
    protected $fillable = ['name', 'order', 'role_name'];
    
// ApprovalStage.php
public function users() {
    return $this->belongsToMany(User::class); // Officers who can approve at this stage
}



    // protected static function newFactory(): ApprovalStageFactory
    // {
    //     // return ApprovalStageFactory::new();
    // }
}
