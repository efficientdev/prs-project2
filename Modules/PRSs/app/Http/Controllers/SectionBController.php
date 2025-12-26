<?php

namespace Modules\PRSs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionBController extends PRSBaseController
{
    public function show(int $reportId)
    {
        $report = $this->findReportOrFail($reportId);
        //$sectionB = $report->getPrs1('sectionB') ?? [];
        $sectionB = $report->getSection('sectionB') ?? null;//always use cie copy
        //$sectionB = $report->getPrs1('sectionB') ?? $sectionBa?? [];

        $formId = 'form-section-b';

        return view('prss::report.section_b_form', compact('report', 'sectionB', 'formId','reportId'));
    }
    public function store(Request $request, int $reportId)
    {
        $report = $this->findReportOrFail($reportId);

        // Define validation rules for the enrollment matrix
        // Example for one row; you can loop through rows dynamically in request
        $rules = [
            'levels' => 'required|array',  // e.g. levels.nursery, levels.primary etc
            'levels.*.level' => 'required|string',
            'levels.*.male' => 'nullable|integer|min:0',
            'levels.*.female' => 'nullable|integer|min:0',
            'levels.*.remarks' => 'nullable|string|max:255',
        ];

        $validated = $request->validate($rules);

        $this->saveSectionData($report, 'sectionB', $validated);

        return redirect()->route('prss.sectionC.show', $reportId);
    }
}