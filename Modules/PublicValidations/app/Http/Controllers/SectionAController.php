<?php

namespace Modules\PublicValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 

class SectionAController extends BaseSectionController
{
    protected $sectionKey = 'sectionA';
    protected $nextSection = 'sectionB';

    protected function processFiles(Request $request, array &$data)
{
    if ($request->hasFile('approval_letter')) {
        $data['approval_letter'] = $request->file('approval_letter')->store("uploads/{$this->sectionKey}");
    }

    if ($request->hasFile('registration_certificate')) {
        $data['registration_certificate'] = $request->file('registration_certificate')->store("uploads/{$this->sectionKey}");
    }
}


    protected $validationRules = [
        'school_name'        => 'required|string|max:255',
        'emis_code'          => 'required|string|max:100',
        //'emis_code'          => 'required|string|max:100|unique:school_records,emis_code',
        'lga'                => 'required|string|max:255',
        'ward'               => 'required|string|max:255',
        'type'               => 'required',
        //'type'               => 'required|in:Primary,JSS,SSS,Combined',
        //'year_established'   => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        'principal_name'     => 'required|string|max:255',
        'phone_email'        => 'required|string|max:255',
    ];
}
