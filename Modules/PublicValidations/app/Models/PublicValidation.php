<?php

namespace Modules\PublicValidations\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\PublicValidations\Database\Factories\PublicValidationFactory;

class PublicValidation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['owner_id','emis_code', 'data','status','submitted'];

    protected $casts = [
        'data' => 'array',
    ];

    // protected static function newFactory(): PublicValidationFactory
    // {
    //     // return PublicValidationFactory::new();
    // }
}
