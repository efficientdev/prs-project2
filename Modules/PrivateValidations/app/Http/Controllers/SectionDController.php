<?php

namespace Modules\PrivateValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\PrivateValidations\Http\Controllers\PrivateValidationsController;

class SectionDController  extends PrivateValidationsController
{
    protected $sectionKey = 'sectionD';

    protected $validationRules = [
        'total_enrolment' => 'required|integer|min:0',
        'enrolment_nursery_male' => 'nullable|integer|min:0',
        'enrolment_nursery_female' => 'nullable|integer|min:0',
        'enrolment_primary_male' => 'nullable|integer|min:0',
        'enrolment_primary_female' => 'nullable|integer|min:0',
        'enrolment_jss_male' => 'nullable|integer|min:0',
        'enrolment_jss_female' => 'nullable|integer|min:0',
        'enrolment_sss_male' => 'nullable|integer|min:0',
        'enrolment_sss_female' => 'nullable|integer|min:0',
    ];
}
