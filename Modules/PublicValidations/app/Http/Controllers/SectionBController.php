<?php

namespace Modules\PublicValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

class SectionBController extends BaseSectionController
{
    protected $sectionKey = 'sectionB';
    protected $nextSection = 'sectionC';

    protected $validationRules = [
        'enrolments' => 'required|array',
        'enrolments.*.level' => 'required|string',
        'enrolments.*.male' => 'required|integer|min:0',
        'enrolments.*.female' => 'required|integer|min:0',
        'enrolments.*.total' => 'required|integer|min:0',
        'enrolments.*.remarks' => 'nullable|string',
    ];
}
