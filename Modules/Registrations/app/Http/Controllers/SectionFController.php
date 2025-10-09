<?php

namespace Modules\Registrations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionFController extends BaseSectionController
{
    protected $sectionKey = 'sectionF';
    protected $nextSection = 'sectionG';

    protected $validationRules = [
        'challenges' => 'required|string|max:1000',
        'needs'      => 'required|string|max:1000',
    ];
}
