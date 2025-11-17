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
        'approval_number' => 'required|string',//|exists:approvals,number
        'school_category' => 'nullable|in:A,B,C',
        'school_level' => 'required|string',
        'school_id' => 'required|integer',
        'user_name' => 'required|string',
        'date_of_approval' => 'required|date',
        'approval_letter' => 'required|file|mimetypes:application/pdf,image/jpeg,image/png|max:10240',
        'certificate_available' => 'required|in:YES,NO',
        'certificate_file' => 'nullable|file|mimetypes:application/pdf,image/jpeg,image/png|max:10240',
        //'lga' => 'required|string',
        //'ward' => 'required|string',
        'lga_id' => 'required|integer',
        'ward_id' => 'required|integer'
    ];


}
