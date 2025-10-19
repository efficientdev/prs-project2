<?php

namespace Modules\PRSs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{PrvInsCategory,TRequirement};
use Modules\Registrations\Models\Registration;

use Modules\Registrations\Models\{RegistrationApproval,RegistrationApprovalStage};
use Modules\Registrations\Services\ApprovalService;

class PRSsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        return view('prss::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prss::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) { 

        $validated = $request->validate([
            'name_of_school' => ['required', 'string', 'max:255'],
    //'type_of_school' => ['required', 'string', 'max:255'],
    'location_of_school' => ['required', 'string', 'max:500'],
            'school_record' => ['required', 'array'],
            'school_record.*' => ['in:Class attendance register,Admission register,Class diaries,Time book,Visitors’ book,School time table,Log book,National Policy on Education,Scheme of work,Lesson notes,Staff Movement Book,Lesson plan,Staff Meeting book'], 
            'other_record' => ['nullable', 'array'],
            'other_record.*' => ['string', 'max:255'],
            'year_founded'         => ['required', 'integer', 'digits:4', 'min:1800', 'max:' . now()->year],
            'name_of_inspectors'   => ['required', 'string'],
            'date_of_inspection'   => ['required', 'date', 'before_or_equal:today'],
            'philosophy'           => ['required', 'string', 'max:2000'],
            'motto'                => ['required', 'string', 'max:255'],
            'school_fees'          => ['required', 'string', 'max:255'],
            'salary_of_teachers'   => ['required', 'string', 'max:255'],
            'physical_facilities'  => ['required', 'string', 'max:2000'],
            'learning_facilities'  => ['required', 'string', 'max:2000'],
            'games_facilities'     => ['required', 'string', 'max:2000'],
            'teacher_qualifications' => ['required', 'array'],
            'teacher_qualifications.*.category' => ['required', 'string'],
            'teacher_qualifications.*.male'     => ['nullable', 'integer', 'min:0'],
            'teacher_qualifications.*.female'   => ['nullable', 'integer', 'min:0'],
            'teacher_qualifications.*.remarks'  => ['nullable', 'string', 'max:255'],
            'levels' => ['required', 'array'],
            'levels.*.level' => ['required', 'string'],
            'levels.*.male'     => ['nullable', 'integer', 'min:0'],
            'levels.*.female'   => ['nullable', 'integer', 'min:0'],
            'levels.*.remarks'  => ['nullable', 'string', 'max:255'],
            'observations' => 'nullable|string|max:1000',
            'recommendations' => 'nullable|string|max:1000',
            'approvals' => ['required', 'array'],
            'approvals.*' => ['array'],
            'approvals.*.*.status' => ['required', 'in:approved,rejected'],
            'approvals.*.*.reason' => ['nullable', 'string', 'max:255'],
        ]);

        $registration=Registration::findOrFail($request->id);

        $cies_reports=$registration->cies_reports??[];

        $approvals = [];
        $yourFileLookup=$cies_reports['sectionH']['uploads']??[]; 
        foreach ($request->input('approvals', []) as $category => $items) {
            foreach ($items as $index => $data) {
                $approvals[$category][$index] = [
                    'file' => $yourFileLookup[$category][$index] ?? null, // associate file from original uploads
                    'status' => $data['status'],
                    'reason' => $data['reason'] ?? null
                ];
            }
        }
        $validated['approvals2']=$approvals;

        // Optionally save as JSON
        //$model->approvals = json_encode($approvals);
        //$model->save();


        $validated[strtolower('NAME_OF_INSPECTOR')] = auth()->user()->name??'';


        $registration->prs_4_report=$validated;
        $registration->save();


        $approval=RegistrationApproval::where([
            'registration_id'=>$request->id,
            'registration_approval_stage_id'=>3
        ])->first();

        (new ApprovalService)->approve($approval, auth()->user(), $request->observations??'n/a');
    //}

        return redirect()->route('prss.report.summary', $request->id);


    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $registration=Registration::findOrFail($id);
        if (isset($registration->prs_4_report)) {
            # code...
        }

        $data=$registration->prs_4_report??[];
        $pdata=$registration->data??[];
        $cies_reports=$registration->cies_reports??[];

        $data['teacher_qualifications']=$cies_reports['sectionC']['teacher_qualifications']??[];
        $data['levels']=$cies_reports['sectionB']['levels']??[];
        $sectionH=$cies_reports['sectionH']??[];
        $approval=$registration->currentApproval();

        return view('prss::formparts.show',compact('data','cies_reports','registration','pdata','approval','sectionH'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('prss::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
