<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRequirement extends Model
{
    //
    protected $fillable = [
        'requirement_name','visible_in_t1','t1_note','visible_in_t2','t2_note','visible_in_t3','t3_note','visible_in_t4','t4_note','visible_in_t5','t5_note','visible_in_t6','t6_note','visible_in_t7','t7_note','visible_in_t8','t8_note','visible_in_t9','t9_note'
    ];
}
