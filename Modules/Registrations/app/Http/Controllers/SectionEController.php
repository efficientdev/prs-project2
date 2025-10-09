<?php

namespace Modules\Registrations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionEController extends BaseSectionController
{
    protected $sectionKey = 'sectionE';
    protected $nextSection = 'sectionF';


    protected $validationRules = [
        'fees' => 'required|array|min:1',
        'other_fees' => 'required|array|min:1',
        'other_fees.*' => 'required|string|max:255',
        'other_fees_amount' => 'required|array|min:2',
        'other_fees_amount.*' => 'required|string|max:255',

    ];
    /*protected $validationRules = [
        'last_inspection_date' => 'required|date',
        'last_emis_submission' => 'required|date',
        'validation_status'    => 'required|in:Compliant,Partially Compliant,Not Compliant',
    ];*/
    //other_fees_amount
}
