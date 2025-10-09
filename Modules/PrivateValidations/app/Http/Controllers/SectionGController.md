<?php

namespace Modules\PrivateValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\PrivateValidations\Http\Controllers\PrivateValidationsController;

//use App\Models\School;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionGController  extends PrivateValidationsController 
{
    protected $sectionKey = 'sectionG';

    protected $validationRules = [
        'declaration' => 'accepted',
        'digital_signature' => 'required|string',
        'signature_date' => 'required|date',
    ];

    public function store(Request $request)
    {
        $validated = $request->validate($this->validationRules);

        Session::put("private.validation.{$this->sectionKey}", $validated);

        // Merge all session data
        $allData = [];
        foreach (['sectionA','sectionB','sectionC','sectionD','sectionE','sectionF','sectionG'] as $section) {
            $allData = array_merge($allData, Session::get("private.validation.{$section}", []));
        }

        // Save to DB - Assuming you have a School model and fillable properties set correctly
        $school = new School();
        $school->fill($allData);
        $school->save();

        Session::forget('registration');

        return redirect()->route('private.validation.sectionA.show')->with('success', 'Registration complete!');
    }
}
