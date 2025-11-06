<?php

namespace Modules\PrivateValidations\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\PrivateValidations\Database\Factories\PrivateValidationFactory;

class PrivateValidation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */ 
    protected $fillable = [
        'owner_id',
        'data', 'submitted'
    ];

    // Cast 'meta' JSON column to array automatically
    protected $casts = [
        'data' => 'array',
    ];

    // protected static function newFactory(): PrivateValidationFactory
    // {
    //     // return PrivateValidationFactory::new();
    // }
}
