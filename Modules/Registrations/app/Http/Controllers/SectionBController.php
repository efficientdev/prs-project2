<?php

namespace Modules\Registrations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionBController extends BaseSectionController
{
    protected $sectionKey = 'sectionB';
    protected $nextSection = 'sectionF';

    
    protected $validationRules = [ 
        'dimension'        => 'required',
        'permanent'        => 'required',
        'inhabited'        => 'required',
        'fenced'        => 'required',
        'toilets'        => 'nullable',
        //'labs'        => 'required',
        //'workshops'        => 'required',
        'other_facilities'        => 'required',
        'classrooms'            => 'required|numeric',
        //'staff_offices'         => 'required|numeric',
        //'stores'                => 'required|numeric',
        'sickbay'               => 'required',
        //'childrentoilet'        => 'required',
        //'play_indoor'               => 'required',
        //'play_indoor_size'        => 'required',
        //'play_outdoor'               => 'required',
        //'play_outdoor_size'        => 'required',

        //'play_equipment' => 'required|array|min:1',
        //'play_equipment.*' => 'required|string|max:255',
        //'play_equipment_qty' => 'required|array|min:2',
        //'play_equipment_qty.*' => 'required|string|max:255',
        'playground_data'=>'required'
    ];
        /*
    protected $validationRules = [
        'enrolments' => 'required|array',
        'enrolments.*.level' => 'required|string',
        'enrolments.*.male' => 'required|integer|min:0',
        'enrolments.*.female' => 'required|integer|min:0',
        'enrolments.*.total' => 'required|integer|min:0',
        'enrolments.*.remarks' => 'nullable|string',
    ];*/
}
