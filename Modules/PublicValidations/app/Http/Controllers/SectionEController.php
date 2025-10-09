<?php

namespace Modules\PublicValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

class SectionEController extends BaseSectionController
{
    protected $sectionKey = 'sectionE';
    protected $nextSection = 'sectionF';

    protected $validationRules = [
        'last_inspection_date' => 'required|date',
        'last_emis_submission' => 'required|date',
        'validation_status'    => 'required|in:Compliant,Partially Compliant,Not Compliant',
    ];
}
