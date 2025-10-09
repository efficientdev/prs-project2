<?php

namespace Modules\PrivateValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\PrivateValidations\Http\Controllers\PrivateValidationsController;

class SectionAController  extends PrivateValidationsController
{
    protected $sectionKey = 'sectionA';

    protected $validationRules = [
        'school_name' => 'required|string',
        'approval_number' => 'required|string|exists:approvals,number',
        'school_category' => 'required|in:A,B,C',
        'school_level' => 'required|string',
        'date_of_approval' => 'required|date',
        'approval_letter' => 'required|file|mimes:pdf,jpg,png',
        'certificate_available' => 'required|in:YES,NO',
        'certificate_file' => 'nullable|file|mimes:pdf,jpg,png',
        'lga' => 'required|string',
        'ward' => 'required|string',
    ];


}
