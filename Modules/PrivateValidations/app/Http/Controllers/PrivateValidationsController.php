<?php

namespace Modules\PrivateValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use Modules\PrivateValidations\Models\PrivateValidation; // Assume this is your model that holds the whole form data 
use Illuminate\Support\Facades\Session;

use App\Models\{City,Lga,SchoolSector,Ward};
 
abstract class PrivateValidationsController extends Controller
{
    protected $sectionKey; // e.g., 'sectionA'

    protected $validationRules = [];

    public function index(Request $request){
        $forms=PrivateValidation::where([
            'owner_id'=>$request->user()->id
        ])->paginate(10);

        return view("privatevalidations::list", compact('forms'));
    }
    public function create(Request $request){
        $form=PrivateValidation::create([
            'owner_id'=>$request->user()->id
        ]);
        return redirect()->route('private.validation.sectionA.show',['form_id'=>$form->id])->with('success', 'Complete the form section by section');
    }

    public function show($form_id)
{
    //dd($form_id);

    Session::put("fid", $form_id);

    $form = PrivateValidation::findOrFail($form_id);
    // Use $form_id to fetch session data or DB data
    $data = Session::get("private.validation.{$form_id}.{$this->sectionKey}", []);
    return view("privatevalidations::v2.{$this->sectionKey}", compact('data', 'form_id'));
}


    /*public function show1()
    {
        $data = Session::get("private.validation.{$this->sectionKey}", []);
        return view("private.validation.{$this->sectionKey}", compact('data'));
    }*/


public function store(Request $request, $form_id)
{
    $validated = $request->validate($this->validationRules);

    /*try { 
        // Handle file uploads
        foreach ($request->files as $key => $file) {
            if ($file) {
                try {
                    $validated[$key] = $file->store('uploads'); 
                } catch (\Exception $e1) {
                    
                }
            }
        } 
    } catch (\Exception $e) {
        
    }*/

    if (in_array('ward_id', array_keys($validated))) { 
        $validated['ward']=Ward::find($validated['ward_id'])->ward_name??'n/a';
    }
    if (in_array('lga_id', array_keys($validated))) { 
        $validated['lga']=Lga::find($validated['lga_id'])->lga_name??'n/a';
    }

    Session::put("private.validation.{$form_id}.{$this->sectionKey}", $validated);

    $nextSection = $this->getNextSection();
    if ($nextSection) {
        return redirect()->route("private.validation.{$nextSection}.show", ['form_id' => $form_id]);
    }

    return redirect()->route('private.validation.sectionA.show', ['form_id' => $form_id]);
}


    /*public function store1(Request $request)
    {
        $validated = $request->validate($this->validationRules);

        // Handle file uploads dynamically if any keys end with _file or similar
        foreach ($request->files as $key => $file) {
            if ($file) {
                $validated[$key] = $file->store('uploads');
            }
        }

        Session::put("private.validation.{$this->sectionKey}", $validated);

        // Redirect to next section, we can map next sections here:
        $nextSection = $this->getNextSection();
        if ($nextSection) {
            return redirect()->route("private.validation.{$nextSection}.show");
        }

        // If no next section, redirect home or wherever
        return redirect()->route('private.validation.sectionA.show');
    }*/

    protected function getNextSection()
    {
        $order = ['sectionA','sectionB','sectionC','sectionD','sectionE','sectionF','sectionG'];
        $currentIndex = array_search($this->sectionKey, $order);
        return $order[$currentIndex+1] ?? null;
    }
}
