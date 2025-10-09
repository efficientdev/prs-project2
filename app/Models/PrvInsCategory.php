<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrvInsCategory extends Model
{
    //
    
    protected $fillable = [
        'category_id','category_name','category_min_length','category_min_breadth','category_app_fee','visible','deleted_at','classes','required_utilities','required_details','teaching_staff','statutory_records'
    ];

    /*
$table->string('category_id');
            $table->string('category_name');
            $table->integer('category_min_length');
            $table->integer('category_min_breadth');
            $table->integer('category_app_fee');
            $table->integer('visible');
            $table->timestamp('deleted_at');
    */
}
