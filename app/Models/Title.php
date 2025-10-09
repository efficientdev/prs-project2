<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    //
    //protected $table        = 'title';
    protected $primaryKey   = 'title_id';

    protected $fillable = [
        'title_name',
    ];
}
