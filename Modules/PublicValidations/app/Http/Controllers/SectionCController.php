<?php

namespace Modules\PublicValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

class SectionCController extends BaseSectionController
{
    protected $sectionKey = 'sectionC';
    protected $nextSection = 'sectionD';

    protected $validationRules = [
        'staff' => 'required|array',
        'staff.*.category' => 'required|string',
        'staff.*.male' => 'required|integer|min:0',
        'staff.*.female' => 'required|integer|min:0',
        'staff.*.total' => 'required|integer|min:0',
        'staff.*.trcn' => 'required|integer|min:0',
        'staff.*.non_trcn' => 'required|integer|min:0',
    ];
}
