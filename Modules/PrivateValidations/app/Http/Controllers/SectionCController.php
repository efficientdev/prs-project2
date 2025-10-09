<?php

namespace Modules\PrivateValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\PrivateValidations\Http\Controllers\PrivateValidationsController;

class SectionCController  extends PrivateValidationsController
{
    protected $sectionKey = 'sectionC';

    protected $validationRules = [
        'total_teaching_staff' => 'required|integer|min:0',
        'qualified_teachers' => 'required|integer|min:0',
        'non_teaching_staff' => 'required|integer|min:0',
        'staff_list_file' => 'required|file|mimes:xlsx,xls,pdf|max:5120', // max 5MB
    ];
}
