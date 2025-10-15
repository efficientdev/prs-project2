<?php

namespace Modules\CIEs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

class SectionCController extends CiesBaseController
{
    public function show(int $reportId)
    {
        $report = $this->findReportOrFail($reportId);
        $data = $report->getSection('sectionC') ?? [];

        return view('cies::report.section_c_form', compact('report', 'data','reportId'));
    }

    public function store(Request $request, int $reportId)
    {
        $validated = $request->validate([
            'staffing' => 'required|array',
            'staffing.*.category' => 'required|string',
            'staffing.*.male' => 'nullable|integer|min:0',
            'staffing.*.female' => 'nullable|integer|min:0',
            'teacher_qualifications' => 'required|array',
            'teacher_qualifications.*.category' => 'required|string',
            'teacher_qualifications.*.male' => 'nullable|integer|min:0',
            'teacher_qualifications.*.female' => 'nullable|integer|min:0',
        ]);

        $report = $this->findReportOrFail($reportId);
        $this->saveSection($report, 'sectionC', $validated);

        return redirect()->route('cies.sectionD.show', $report->id);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cies::index');
    }
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('cies::edit');
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
