<?php

namespace Modules\PublicValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
 
use Illuminate\Support\Facades\Session;
use Modules\PublicValidations\Models\PublicValidation;

use App\Models\{PrvInsCategory,TRequirement};

use App\Models\{City,Lga,SchoolSector};

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


        $form->data = array_merge($form->data ?? [], [
            $this->sectionKey => $validated,
        ]);
        $form->save();

        return redirect()->route("public.validation.{$this->nextSection}.show", $form_id)
                         ->with('success', 'Section saved successfully.');
    }
} 