<?php

namespace Modules\Registrations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionDController extends BaseSectionController
{
    protected $sectionKey = 'sectionD';
    protected $nextSection = 'sectionE';

    protected $validationRules = [

        'learning_equipment' => 'required|array|min:1',
        'learning_equipment.*' => 'required|string|max:255',
        'learning_equipment_qty' => 'required|array|min:2',
        'learning_equipment_qty.*' => 'required|string|max:255',

    ];
}
