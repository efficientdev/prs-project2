<?php

namespace Modules\Registrations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionCController extends BaseSectionController
{
    protected $sectionKey = 'sectionC';
    protected $nextSection = 'sectionD';

    protected $validationRules = [
        'staff_surname.0' => 'required|string|max:255',
        'staff_other_names.0' => 'required|string|max:255',
        'staff_qualification.0' => 'required|string|max:255',
        
        // For other staff entries, if surname exists, require other fields too
        'staff_surname.*' => 'nullable|string|max:255',
        'staff_other_names.*' => 'nullable|string|max:255',
        'staff_qualification.*' => 'nullable|string|max:255',
    ];

/*
// Custom validator to ensure all fields filled for additional staff entries
Validator::make($request->all(), $rules)->after(function ($validator) use ($request) {
    $surnames = $request->input('staff_surname', []);
    $otherNames = $request->input('staff_other_names', []);
    $qualifications = $request->input('staff_qualification', []);

    foreach ($surnames as $index => $surname) {
        if ($index === 0) continue; // skip first, already required
        
        $hasData = $surname || ($otherNames[$index] ?? '') || ($qualifications[$index] ?? '');
        $allFilled = $surname && ($otherNames[$index] ?? '') && ($qualifications[$index] ?? '');
        
        if ($hasData && !$allFilled) {
            $validator->errors()->add("staff_surname.$index", "All fields are required for staff entry #" . ($index + 1));
        }
    }
})->validate();
*/

    /*protected $validationRules = [
        'staff' => 'required|array',
        'staff.*.category' => 'required|string',
        'staff.*.male' => 'required|integer|min:0',
        'staff.*.female' => 'required|integer|min:0',
        'staff.*.total' => 'required|integer|min:0',
        'staff.*.trcn' => 'required|integer|min:0',
        'staff.*.non_trcn' => 'required|integer|min:0',
    ];*/
}
