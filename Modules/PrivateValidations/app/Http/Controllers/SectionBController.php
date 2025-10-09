<?php

namespace Modules\PrivateValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\PrivateValidations\Http\Controllers\PrivateValidationsController;

class SectionBController  extends PrivateValidationsController
{
    protected $sectionKey = 'sectionB';

    protected $validationRules = [
        'proprietor_name' => 'required|string|max:255',
        'proprietor_phone' => 'required|string|max:20',
        'proprietor_email' => 'required|email|max:255',
        'head_teacher_name' => 'required|string|max:255',
        'contact_address' => 'required|string|max:500',
    ];
}
