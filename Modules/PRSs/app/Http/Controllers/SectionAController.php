<?php

namespace Modules\PRSs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

    use Illuminate\Support\Facades\Storage;
 
use App\Models\{Category,Lga,Ward};

class SectionAController extends PRSBaseController
{
    public function show(int $reportId)
    {
        $report = $this->findReportOrFail($reportId);
        $sectionA= $inspectionReport = $report->getPrs1('sectionA') ?? [];

        $proprietorSectionA = $report->getProprietorSection('sectionA') ?? [];

        $categories = collect(['' => 'Select Category'] + Category::pluck('category_name','id')->all()??[])->toArray();
        $lgas = collect(['' => 'Select Lga'] + Lga::pluck('lga_name','lga_id')->all()??[])->toArray();

        $formId = 'form-section-a';

        return view('prss::report.section_a_form', compact('report', 'sectionA','inspectionReport', 'formId','reportId','categories','lgas','proprietorSectionA'));
    } 
    public function store(Request $request, int $reportId)
    {
        $report = $this->findReportOrFail($reportId);
        $validated = $request->validate([
            'school_location' => 'required|string',
            'school_name' => 'required|string',
            'year_founded' => 'required|string',
            'inspection_date' => 'required|date',
            'inspectors' => 'required|array|min:1',
            'inspectors.*' => 'required|string',

            'signatures' => 'nullable|array',
            'signatures.*' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',

            'philosophy' => 'required|string',
            'motto' => 'required|string',
            'school_fees' => 'required|string',
            'teacher_salary' => 'required|string',
            'physical_facilities' => 'required|string',
            'learning_facilities' => 'required|string',
            'games_facilities' => 'required|string',
            'school_records' => 'required|array',
            'other_records' => 'nullable|string',
        ]);

        $signaturePaths = [];

        if ($request->hasFile('signatures')) {
            foreach ($request->file('signatures') as $index => $file) {
                if ($file) {
 
                    $path = $file->store('signatures', 'public');
                    $url = asset('storage/' . $path);
                    $signaturePaths[$index] = $url;
                }
            }
        }

        $validated['signatures'] = $signaturePaths;

        /*InspectionReport::create([
            'report_data' => $validated
        ]);*/


        $this->saveSectionData($report, 'sectionA', $validated);

        return redirect()->route('prss.sectionB.show', $reportId)->with('success', 'Inspection report saved with signatures.');
        //return back()->with('success', 'Inspection report saved with signatures.');
    }

    public function update(Request $request, int $inspectionReport)
    {
        $report = $this->findReportOrFail($inspectionReport);
        $sectionA = $report->getSection('sectionA') ?? [];

        $existing = $inspectionReport->report_data;


        $validated = $request->validate([
            'school_name'=> 'required|string',
            'school_address'=> 'required|string',
            'year_founded' => 'required|string',
            'inspection_date' => 'required|date',
            'inspectors' => 'required|array|min:1',
            'inspectors.*' => 'required|string',

            'signatures' => 'nullable|array',
            'signatures.*' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',

            'philosophy' => 'required|string',
            'motto' => 'required|string',
            'school_fees' => 'required|string',
            'teacher_salary' => 'required|string',
            'physical_facilities' => 'required|string',
            'learning_facilities' => 'required|string',
            'games_facilities' => 'required|string',
            'school_records' => 'required|array',
            'other_records' => 'nullable|string',
        ]);

        $signaturePaths = $existing['signatures'] ?? [];

        if ($request->hasFile('signatures')) {
            foreach ($request->file('signatures') as $index => $file) {
                if ($file) {
                    $signaturePaths[$index] = $file->store('signatures', 'public');
                }
            }
        }

        $validated['signatures'] = $signaturePaths;

        /*$inspectionReport->update([
            'report_data' => $validated
        ]);*/
        $this->saveSectionData($report, 'sectionA', $validated);

        return back()->with('success', 'Inspection report updated.');
    }

    public function store1(Request $request)
    {
        $validated = $request->validate([
            'year_founded' => 'required|string',
            'inspection_date' => 'required|date',
            'inspectors' => 'required|array|min:1',
            'inspectors.*' => 'required|string',
            'philosophy' => 'required|string',
            'motto' => 'required|string',
            'school_fees' => 'required|string',
            'teacher_salary' => 'required|string',
            'physical_facilities' => 'required|string',
            'learning_facilities' => 'required|string',
            'games_facilities' => 'required|string',
            'school_records' => 'required|array',
            'other_records' => 'nullable|string',
        ]);

/*
        InspectionReport::create([
            'report_data' => $validated
        ]);*/

        return redirect()->back()->with('success', 'Inspection report saved successfully.');
    }

    public function update1(Request $request, Registration $inspectionReport)
    {
        $validated = $request->validate([
            'year_founded' => 'required|string',
            'inspection_date' => 'required|date',
            'inspectors' => 'required|array|min:1',
            'inspectors.*' => 'required|string',
            'philosophy' => 'required|string',
            'motto' => 'required|string',
            'school_fees' => 'required|string',
            'teacher_salary' => 'required|string',
            'physical_facilities' => 'required|string',
            'learning_facilities' => 'required|string',
            'games_facilities' => 'required|string',
            'school_records' => 'required|array',
            'other_records' => 'nullable|string',
        ]);
/*
        $inspectionReport->update([
            'report_data' => $validated
        ]);*/

        return redirect()->back()->with('success', 'Inspection report updated.');
    } 

    public function store0(Request $request, int $reportId)
    {
        $report = $this->findReportOrFail($reportId);

        $validated = $request->validate([ 
            'date_of_inspection'=> 'required|string|max:100',
            'school_name' => 'required|string|max:255', 
            'lga_id' => 'required',
            'ward_id' => 'required',
            //'zonal_office' => 'required|string|max:255',
        ]);

 
        if (in_array('lga_id', array_keys($validated))) { 
            $validated['lga']=Lga::find($validated['lga_id'])->lga_name??'n/a';
        }
        if (in_array('ward_id', array_keys($validated))) { 
            $validated['ward']=Ward::find($validated['ward_id'])->ward_name??'n/a';
        }

        $this->saveSectionData($report, 'sectionA', $validated);

        return redirect()->route('prss.sectionB.show', $reportId);
    }

 
}
