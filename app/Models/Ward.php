<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    //
    
    protected $fillable = [
        'ward_id',
        'lga_id',
        'lga_name',
        'ward_name',
        'ward_no',
    ];
}
