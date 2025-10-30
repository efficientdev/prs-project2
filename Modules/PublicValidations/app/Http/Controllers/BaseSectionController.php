<?php

namespace Modules\PublicValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
 
use Illuminate\Support\Facades\Session;
use Modules\PublicValidations\Models\PublicValidation;

use App\Models\{PrvInsCategory,TRequirement};
 
use App\Models\{City,Lga,SchoolSector,Ward};

class BaseSectionController extends Controller
{
    protected $sectionKey;


    public function index(Request $request){
        $forms=PublicValidation::where([
            'owner_id'=>$request->user()->id
        ])->paginate(10);

        return view("publicvalidations::list", compact('forms'));
    }
    public function create(Request $request){
        $form=PublicValidation::create([
            'owner_id'=>$request->user()->id
        ]);
        return redirect()->route('public.validation.sectionA.show',['form_id'=>$form->id])->with('success', 'Complete the form section by section');
    }

    public function show($form_id)
    {
        $form = PublicValidation::findOrFail($form_id);


        $cats=PrvInsCategory::all();
        $lgas=Lga::all();

    Session::put("fid", $form_id);
        $data = $form->data[$this->sectionKey] ?? [];

        return view("publicvalidations::registration.{$this->sectionKey}", [
            'form_id' => $form_id,
            'data' => $data,
            'categories'=>$cats,
            'lgas'=>$lgas
        ]);
    }

    public function store(Request $request, $form_id)
    {
        $form = PublicValidation::findOrFail($form_id);

        $validated = $request->validate($this->validationRules);

        //$this->processFiles($request, $data);



        if (in_array('ward_id', array_keys($validated))) { 
            $validated['ward']=Ward::find($validated['ward_id'])->ward_name??'n/a';
        }
        if (in_array('lga_id', array_keys($validated))) { 
            $validated['lga']=Lga::find($validated['lga_id'])->lga_name??'n/a';
        }


        $form->data = array_merge($form->data ?? [], [
            $this->sectionKey => $validated,
        ]);
        $form->save();

        return redirect()->route("public.validation.{$this->nextSection}.show", $form_id)
                         ->with('success', 'Section saved successfully.');
    }
} 