<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public $primaryKey='city_id';
    protected $fillable = [
        'city_id',
        'city_name', 
    ]; 
}
