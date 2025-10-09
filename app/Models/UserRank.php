<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRank extends Model
{
    //
    public $primaryKey='user_rank_id';
    protected $fillable = [
        'user_rank_id',
        'user_rank_name'
    ];
 
}
