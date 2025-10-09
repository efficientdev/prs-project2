<?php

namespace Modules\Registrations\Http\Controllers;

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
        'owner_address'        => 'required|string|max:255',
        'owner_qualifications'          => 'required|string|max:255',
        'owner_address_lga'        => 'required',
        'owner_ward_id'          => 'required', 
        'funding_source'        => 'required',
        'funding_capital'          => 'required', 
        'proposed_name'        => 'required',
        'school_sector_id'          => 'required', 
        'school_address_lga'        => 'required',
        'school_ward_id'          => 'required', 
        'school_address'        => 'required',
        //'postal_address'          => 'required', 
        'purpose_for_establishment'          => 'required', 
        'nearby_school' => 'required|array|min:1',
        'nearby_school.*' => 'required|string|max:255',
        'nearby_distance' => 'required|array|min:2',
        'nearby_distance.*' => 'required|string|max:255',
    ];
}
