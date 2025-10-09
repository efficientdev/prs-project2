<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    //
    public $primaryKey='lga_id';
    protected $fillable = [
        'lga_id',
        'lga_name', 
    ]; 

}
