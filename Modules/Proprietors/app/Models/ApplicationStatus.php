<?php

namespace Modules\Proprietors\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Proprietors\Database\Factories\ApplicationStatusFactory;

class ApplicationStatus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['status_name','id','next_id','next_role'];

    // protected static function newFactory(): ApplicationStatusFactory
    // {
    //     // return ApplicationStatusFactory::new();
    // }
}
