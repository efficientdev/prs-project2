<?php

namespace Modules\PublicValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SectionDController extends BaseSectionController
{
    protected $sectionKey = 'sectionD';
    protected $nextSection = 'sectionE';

    protected $validationRules = [
        'classrooms_in_use' => 'required|integer|min:0',
        'classrooms_needing_repairs' => 'required|integer|min:0',
        'functional_toilets' => 'required|integer|min:0',
        'water_source' => 'required|in:Borehole,Tap,Well,None',
        'electricity' => 'required|in:Yes,No',
        'library' => 'required|in:Yes,No',
        'laboratories' => 'required|in:Science,ICT,Home Economics,None',
        'security' => 'required|in:Fence,Gate,Security personnel',
        'teaching_materials' => 'required|in:Yes,No',
    ];
}
