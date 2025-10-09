<?php

namespace Modules\PrivateValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\PrivateValidations\Http\Controllers\PrivateValidationsController;

class SectionEController  extends PrivateValidationsController
{
    protected $sectionKey = 'sectionE';

    protected $validationRules = [
        'num_classrooms' => 'required|integer|min:0',
        'num_toilets' => 'required|integer|min:0',
        'library_available' => 'required|in:YES,NO',
        'laboratories_available' => 'required|in:YES,NO',
        'laboratories_science' => 'nullable|boolean',
        'laboratories_ict' => 'nullable|boolean',
        'laboratories_home_economics' => 'nullable|boolean',
        'laboratories_others' => 'nullable|string|max:255',
        'facility_photos.*' => 'required|file|image|max:5120', // multiple file uploads max 5MB each
    ];
}
