<?php
namespace Modules\PrivateValidations\Http\Controllers;

use Illuminate\Http\Request;
use Modules\PrivateValidations\Models\PrivateValidation; // Assume this is your model that holds the whole form data 
 
use Modules\PrivateValidations\Http\Controllers\PrivateValidationsController;

//use App\Models\School;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionGController  extends PrivateValidationsController 
{
    protected $sectionKey = 'sectionG';

    protected $validationRules = [
        'declaration_agreed' => 'accepted',
        'digital_signature' => 'required|string|max:255',
        'declaration_date' => 'required|date',
    ];

    public function show($form_id)
    {
        $form = PrivateValidation::findOrFail($form_id);

        // Pass sectionG data (if any) or empty array to the view
        $data = $form->data['sectionG'] ?? [];

        return view('privatevalidations::v2.sectionG', [
            'form_id' => $form_id,
            'data' => $data,
        ]);
    }



    public function preview($form_id)
    {
        $form = PrivateValidation::findOrFail($form_id);

        $requiredSections = ['sectionA','sectionB','sectionC','sectionD','sectionE','sectionF'];

        $data = $form->data[$this->sectionKey] ?? [];

        foreach ($requiredSections as $section) {
            if (empty($form->data[$section])) {
                return redirect()->route("public.validation.{$section}.show", $form_id)
                    ->with('error', 'Please complete all previous sections first.');
            }
        }

        return view('privatevalidations::preview', [
            'form' => $form,
            'form_id' => $form_id,
            'data'=>$data
        ]);
    }

    public function store(Request $request, $form_id)
    {
        $form = PrivateValidation::findOrFail($form_id);

        // Check if all previous sections A to F are complete
        /*$missingSections = $this->checkIncompleteSections($form);

        if (!empty($missingSections)) {
            return redirect()->back()
                ->withErrors(['incomplete_sections' => 'Please complete all previous sections before submitting the declaration: '.implode(', ', $missingSections)])
                ->withInput();
        }*/

        // Validate Section G inputs
        $validated = $request->validate($this->validationRules);

        // Save Section G data
        $form->data = array_merge($form->data ?? [], ['sectionG' => $validated]);
        $form->submitted=true;
        $form->save();

        // Final step: maybe mark form as completed or redirect somewhere .list
        return redirect()->route('private.validation.list')
            ->with('success', 'Declaration submitted successfully.');
        /*return redirect()->route('private.validation.complete', ['form_id' => $form_id])
            ->with('success', 'Declaration submitted successfully.');*/
    }

    /**
     * Check if all required sections (A to F) are completed.
     * Returns array of section names that are incomplete.
     */
    protected function checkIncompleteSections(PrivateValidation $form)
    {
        $requiredSections = ['sectionA', 'sectionB', 'sectionC', 'sectionD', 'sectionE', 'sectionF'];
        $missingSections = [];

        foreach ($requiredSections as $section) {
            if (empty($form->data[$section]) || !$this->isSectionComplete($form->data[$section], $section)) {
                $missingSections[] = strtoupper($section);
            }
        }

        return $missingSections;
    }

    /**
     * Basic completeness check for a section.
     * You can extend these with detailed checks if needed.
     */
    protected function isSectionComplete(array $sectionData, string $section)
    {
        // Minimal required fields per section for demonstration:
        $requiredFieldsPerSection = [
            'sectionA' => ['school_name', 'approval_number', 'school_category', 'school_level', 'date_of_approval', 'certificate_registration_available', 'lga_ward'],
            'sectionB' => ['proprietor_name', 'proprietor_phone', 'proprietor_email', 'head_teacher_name', 'contact_address'],
            'sectionC' => ['total_teaching_staff', 'qualified_teachers', 'non_teaching_staff', 'staff_list_file'],
            'sectionD' => ['total_enrolment'],
            'sectionE' => ['num_classrooms', 'num_toilets', 'library_available', 'laboratories_available', 'facility_photos'],
            'sectionF' => ['last_renewal_date', 'renewal_receipt_2022', 'renewal_receipt_2023', 'renewal_receipt_2024', 'renewal_receipt_2025', 'expiry_date', 'paid_renewal_fees'],
        ];

        if (!isset($requiredFieldsPerSection[$section])) {
            return true; // If no rules defined, assume complete
        }

        foreach ($requiredFieldsPerSection[$section] as $field) {
            if (empty($sectionData[$field])) {
                return false;
            }
        }

        return true;
    }
}
