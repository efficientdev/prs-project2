<?php

namespace Modules\Registrations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Registrations\Models\Registration;


use Modules\Registrations\Models\RegistrationApproval;
use Modules\Registrations\Models\RegistrationApprovalStage;
use Modules\Registrations\Services\ApprovalService;

class SectionGController extends Controller
{
    protected $sectionKey = 'sectionG';

    public function show($form_id)
    {
        $form = Registration::findOrFail($form_id);
//'sectionC','sectionD','sectionE',
        $requiredSections = ['sectionA','sectionB','sectionF'];

        $data = $form->data[$this->sectionKey] ?? [];

        foreach ($requiredSections as $section) {
            if (empty($form->data[$section])) {
                return redirect()->route("registration.{$section}.show", $form_id)
                    ->with('error', 'Please complete all previous sections first.');
            }
        }

        return view('registrations::registration.sectionG', [
            'form' => $form,
            'form_id' => $form_id,
            'data'=>$data
        ]);
    }

    public function preview($form_id)
    {
        $form = Registration::findOrFail($form_id);

        $requiredSections = ['sectionA','sectionB','sectionC','sectionD','sectionE','sectionF'];

        $data = $form->data[$this->sectionKey] ?? [];

        foreach ($requiredSections as $section) {
            if (empty($form->data[$section])) {
                return redirect()->route("registration.{$section}.show", $form_id)
                    ->with('error', 'Please complete all previous sections first.');
            }
        }

        return view('registrations::preview', [
            'form' => $form,
            'form_id' => $form_id,
            'data'=>$data
        ]);
    }

    public function store(Request $request, $form_id)
    {
        $validated = $request->validate([
            'declaration' => 'accepted',
            //'signature'   => 'required|string',
            //'date_signed' => 'required|date',
        ]);

        $form = Registration::findOrFail($form_id);
        if ($form->status !== 'in_progress') {
            abort(403, 'Application is not eligible for resubmission.');
        }
        $x=$form->data??[];
        $x['sectionG'] = $validated;
        $form->data=$x;
        //$form->status="pending";
        $form->save();


        $initialStage = RegistrationApprovalStage::orderBy('order')->first();

        RegistrationApproval::create([
            'registration_id' => $form->id,
            'registration_approval_stage_id' => $initialStage->id,
        ]);


        //return back()->with('success', 'Section saved successfully.');

        return redirect()->route('registration.preview', $form_id)
            ->with('success', 'Form completed successfully!');
    }
}
