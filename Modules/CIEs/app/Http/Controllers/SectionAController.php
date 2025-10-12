<?php

namespace Modules\CIEs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

use App\Models\{Category,Lga};

class SectionAController extends CiesBaseController
{
    public function show(int $reportId)
    {
        $report = $this->findReportOrFail($reportId);
        $sectionA = $report->getSection('sectionA') ?? [];

        $proprietorSectionA = $report->getProprietorSection('sectionA') ?? [];

        $categories = collect(['' => 'Select Category'] + Category::pluck('category_name','id')->all()??[])->toArray();
        $lgas = collect(['' => 'Select Lga'] + Lga::pluck('lga_name','lga_id')->all()??[])->toArray();

        $formId = 'form-section-a';

        return view('cies::report.section_a_form', compact('report', 'sectionA', 'formId','reportId','categories','lgas','proprietorSectionA'));
    }

    public function store(Request $request, int $reportId)
    {
        $report = $this->findReportOrFail($reportId);

        $validated = $request->validate([
            //'report_title' => 'required|string|max:255',
            //'reporting_period' => 'required|string|max:100',
            'date_of_inspection'=> 'required|string|max:100',
            'school_name' => 'required|string|max:255',
            //'approval_number' => 'nullable|string|max:100',
            //'category' => 'required|in:Nursery,Primary,JSS,SSS,Combined',
            //'lga' => 'required|string|max:255',
            //'category_id' => 'nullable',
            'lga_id' => 'required',
            //'zonal_office' => 'required|string|max:255',
        ]);


        /*if (in_array('category_id', array_keys($validated))) { 
            $validated['category']=Category::find($validated['category_id'])->category_name??'n/a';
        }*/
        if (in_array('lga_id', array_keys($validated))) { 
            $validated['lga']=Lga::find($validated['lga_id'])->lga_name??'n/a';
        }

        $this->saveSectionData($report, 'sectionA', $validated);

        return redirect()->route('cies.sectionB.show', $reportId);
    }

 
}
