<?php

namespace Modules\PublicValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

use Modules\PublicValidations\Models\PublicValidation;

class SectionGController extends Controller
{   protected $sectionKey = 'sectionG';

    public function show($form_id)
    {
        $form = PublicValidation::findOrFail($form_id);

        $requiredSections = ['sectionA','sectionB','sectionC','sectionD','sectionE','sectionF'];

        $data = $form->data[$this->sectionKey] ?? [];

        foreach ($requiredSections as $section) {
            if (empty($form->data[$section])) {
                return redirect()->route("public.validation.{$section}.show", $form_id)
                    ->with('error', 'Please complete all previous sections first.');
            }
        }

        return view('publicvalidations::registration.sectionG', [
            'form' => $form,
            'form_id' => $form_id,
            'data'=>$data
        ]);
    }

    public function preview($form_id)
    {
        $form = PublicValidation::findOrFail($form_id);

        $requiredSections = ['sectionA','sectionB','sectionC','sectionD','sectionE','sectionF'];

        $data = $form->data[$this->sectionKey] ?? [];

        foreach ($requiredSections as $section) {
            if (empty($form->data[$section])) {
                return redirect()->route("public.validation.{$section}.show", $form_id)
                    ->with('error', 'Please complete all previous sections first.');
            }
        }

        return view('publicvalidations::preview', [
            'form' => $form,
            'form_id' => $form_id,
            'data'=>$data
        ]);
    }

    public function store(Request $request, $form_id)
    {
        $validated = $request->validate([
            'declaration' => 'accepted',
            'signature'   => 'required|string',
            'date_signed' => 'required|date',
        ]);

        $form = PublicValidation::findOrFail($form_id);
        $x=$form->data??[];
        $x['sectionG'] = $validated;
        $form->data=$x;
        $form->status="in_progress";
        $form->save();


        return back()->with('success', 'Section saved successfully.');

        /*return redirect()->route('public.validation.preview', $form_id)
            ->with('success', 'Form completed successfully!');*/
    }
}
