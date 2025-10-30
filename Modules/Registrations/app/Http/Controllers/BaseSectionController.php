<?php

namespace Modules\Registrations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
 
use Illuminate\Support\Facades\Session;
use Modules\Registrations\Models\Registration;

use App\Models\{PrvInsCategory,TRequirement};

use App\Models\{City,Lga,SchoolSector,Ward};

use Modules\Proprietors\Models\{Application,ApplicationPayment}; 

class BaseSectionController extends Controller
{
    protected $sectionKey;

    protected function createApplicationPayment($a){
        $p=ApplicationPayment::where(['registration_id'=>$a->id])->first();
        if($p==null){

            $data['v3']=PrvInsCategory::find($a->data['type_id']); 

            $application_fee=$data['v3']->category_app_fee??30000; 

            $charge=(((1.52/100)*$application_fee)+100);
            if ($charge>2500) {
                $charge=2500;
            }
            $data=$a->data??[];
            $ndata=[...$data, 
                'fee'=>$application_fee,
                'applicable_charge'=>$charge,
            ];
            $a->data=$ndata;
            //$a->save();

            ApplicationPayment::create([
                'registration_id'=>$a->id,
                'meta'=>[
                    'type_id'=>$a->data['type_id'],
                    'fee'=>$application_fee,
                    'applicable_charge'=>$charge,
                ],
                'user_id'=>auth()->user()->id
            ]);
        }

    }

    public function index(Request $request){
        $forms=Registration::where([
            'owner_id'=>$request->user()->id
        ])
        ->with([
            'owner','approvals.stage', 'approvals.user','pendingApprovalPay'
            //'currentApproval.stage', 'currentApproval.user'
        ])
        ->paginate(10);

        return view("registrations::list", compact('forms'));
    }
    public function create(Request $request,$cat_id){


        $category=PrvInsCategory::find($cat_id); 

        $form=Registration::create([
            'owner_id'=>$request->user()->id,
            'data'=>[
                'category_id'=>$cat_id,
                'category'=>$category->category_name??'',
                'type_id'=>$cat_id,
            ]
        ]);
        return redirect()->route('registration.sectionA.show',['form_id'=>$form->id])->with('success', 'Complete the form section by section');
    }

    public function show($form_id)
    {
        $form = $a = Registration::findOrFail($form_id);

        if ($a->status !== 'in_progress') {
            //redirect to preview
            abort(403, 'Application is not eligible for resubmission.');
        }
        if ($a->submitted) {
            //redirect to preview
            abort(403, 'You have already submitted this Application and not eligible for resubmission.');
        }
         
        $cYear=$a->created_at->format('Y')??date('y');
        $uploadsList=[
            'CAC Certificate',
            'Evidence of School ownership or Tenancy/Lease agreement '
            //'Tax Clearance Certificate for '.($cYear-3),
            //'Tax Clearance Certificate for '.($cYear-2),
            //'Tax Clearance Certificate for '.($cYear-1),
            //'Evidence of school land ownership',
            //'A statement of means for financing the school',
            //"A copy of the school’s Prospectus",
            //"The master or building Plan for the School Buildings"
        ];  

        $requiredSections = ['sectionA','sectionB','sectionC','sectionD','sectionE','sectionF'];

        if($this->sectionKey=='sectionF'){
            $this->createApplicationPayment($a);
            
            $type='application';
            $payment=$a->registrationPayment;
            $ownerId=$payment->id??0;
        }
            $a->load('registrationPayment');
        /*$data = $form->data[$this->sectionKey] ?? [];

        foreach ($requiredSections as $section) {
            if($section=='sectionA'){
                break;
            }else if($this->sectionKey==$section && empty($form->data[$section])){
                //$x=$requiredSections;
                //array_pop($x);
                return redirect()->route("registration.{$requiredSections[count($requiredSections)-2]}.show", $form_id)
                    ->with('error', 'Please complete all previous sections first.');
                break;
            }else if (empty($form->data[$section])) {
                return redirect()->route("registration.{$section}.show", $form_id)
                    ->with('error', 'Please complete all previous sections first.');
            }
        }*/
        $category=PrvInsCategory::find($a->data['type_id']);


        $cats=PrvInsCategory::all();
        //$lgas=Lga::all();
        $cities = collect(['' => 'Select City'] + City::pluck('city_name','city_id')->all()??[])->toArray();

        $wards = collect(['' => 'Select Ward'] + Ward::orderBy('ward_name')->pluck('ward_name','ward_id')->all()??[])->toArray();

        $lgas   = collect(['' => 'Select LGA'] + Lga::pluck('lga_name','lga_id')->all()??[])->toArray();
        $school_sectors   = collect(['' => 'Select School Sector'] + SchoolSector::pluck('school_sector_name','school_sector_id')->all()??[])->toArray();

        Session::put("fid", $form_id);
        $data = $form->data[$this->sectionKey] ?? [];

        return view("registrations::registration.{$this->sectionKey}", [
            'form_id' => $form_id,
            'data' => $data,
            'categories'=>$cats,
            'lgas'=>$lgas,
            'school_sectors'=>$school_sectors,
            'cities'=>$cities,
            'wards'=>$wards,
            'a'=>$a,
            'category'=>$category,
            'uploadsList'=>$uploadsList,
            'type'=>$type??'',
            'ownerId'=>$ownerId??'',
            'payment'=>$payment??[]
        ]);
    }

    public function store(Request $request, $form_id)
    {
        $form = Registration::findOrFail($form_id);

        $validated = $request->validate($this->validationRules);

        if ($this->sectionKey=='sectionA') {
            # code...
            $metas=auth()->user()->meta??[];
            foreach ($metas as $key => $value) {
                # code...
                $validated[$key]=$value;
            }
        }
 
        //$this->processFiles($request, $data); 
        if (in_array('owner_ward_id', array_keys($validated))) { 
            $validated['owner_ward']=Ward::find($validated['owner_ward_id'])->ward_name??'n/a';
        }

        if (in_array('school_sector_id', array_keys($validated))) { 
            $validated['school_sector']=SchoolSector::find($validated['school_sector_id'])->school_sector_name??'n/a';
        }
        if (in_array('school_ward_id', array_keys($validated))) { 
            $validated['school_ward']=Ward::find($validated['school_ward_id'])->ward_name??'n/a';
        }
        /*if (in_array('owner_address_city', array_keys($validated))) { 
            $validated['owner_city']=City::find($validated['owner_address_city'])->city_name??'n/a';
        }
        if (in_array('school_address_city', array_keys($validated))) { 
            $validated['school_city']=City::find($validated['school_address_city'])->city_name??'n/a';
        }*/
        if (in_array('owner_address_lga', array_keys($validated))) { 
            $validated['owner_lga']=Lga::find($validated['owner_address_lga'])->lga_name??'n/a';
        } 
        if (in_array('owner_lga_id', array_keys($validated))) { 
            $validated['owner_lga']=Lga::find($validated['owner_lga_id'])->lga_name??'n/a';
        }
        if (in_array('school_address_lga', array_keys($validated))) { 
            $validated['school_lga']=Lga::find($validated['school_address_lga'])->lga_name??'n/a';
        }
        if (in_array('school_lga_id', array_keys($validated))) { 
            $validated['school_lga']=Lga::find($validated['school_lga_id'])->lga_name??'n/a';
        }
        //Lga


        $form->data = array_merge($form->data ?? [], [
            $this->sectionKey => $validated,
        ]);
        $form->save();

        return redirect()->route("registration.{$this->nextSection}.show", $form_id)
                         ->with('success', 'Section saved successfully.');
    }
} 