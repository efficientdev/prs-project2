<?php

namespace Modules\PRSs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class SectionCController extends PRSBaseController
{
    public function show(int $reportId)
    {
        $report = $this->findReportOrFail($reportId);
        $data = $report->getSection('sectionC') ?? null;//always use cie copy
        //$data = $report->getPrs1('sectionC') ?? [];

        //

        return view('prss::report.section_c_form', compact('report', 'data','reportId'));
    }

    public function store(Request $request, int $reportId)
    {
        $validated = $request->validate([
            'staffing' => 'required|array',
            'staffing.*.category' => 'required|string',
            'staffing.*.male' => 'nullable|integer|min:0',
            'staffing.*.female' => 'nullable|integer|min:0',
            'staffing.*.remarks' => 'required|string',
            'teacher_qualifications' => 'required|array',
            'teacher_qualifications.*.category' => 'required|string',
            'teacher_qualifications.*.male' => 'nullable|integer|min:0',
            'teacher_qualifications.*.female' => 'nullable|integer|min:0',
            'teacher_qualifications.*.remarks' => 'required|string',
        ]);

        $report = $this->findReportOrFail($reportId);
        $this->saveSection($report, 'sectionC', $validated);

        return redirect()->route('prss.sectionD.show', $report->id);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('prss::index');
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
