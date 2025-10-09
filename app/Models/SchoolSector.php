<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolSector extends Model
{
    //

    public $primaryKey='school_sector_id';
    protected $fillable = [
        'school_sector_id',
        'school_sector_name', 
    ]; 
}
