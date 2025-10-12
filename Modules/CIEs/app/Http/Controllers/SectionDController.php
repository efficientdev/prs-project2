<?php

namespace Modules\CIEs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class SectionDController extends CiesBaseController
{
    public function show(int $reportId)
    {
        $report = $this->findReportOrFail($reportId);
        $data = $report->getSection('sectionD') ?? [];
        return view('cies::report.section_d_form', compact('report', 'data','reportId'));
    }

    public function store(Request $request, int $reportId)
    {
        $validated = $request->validate([
            'classrooms_in_use' => 'nullable|integer|min:0',
            'class_dimension_in_feet'=> 'nullable|integer|min:0',
            'average_class_size' => 'nullable|integer|min:0',
            'functional_toilets' => 'nullable|integer|min:0',
            'library' => 'required|in:Yes,No',
            'laboratories' => 'nullable|array',
            'laboratories.*' => 'string|max:255',
            'other_labs' => ['nullable', 'array'],
        'other_labs.*' => ['string', 'max:255'],
            'electricity' => 'required|in:Yes,No',
            'water_supply' => 'required|in:Borehole,Well,None',
            'security' => 'nullable|array',
            'security.*' => 'string|max:255',
        ]);

        $report = $this->findReportOrFail($reportId);
        $this->saveSection($report, 'sectionD', $validated);

        return redirect()->route('cies.sectionG.show', $report->id);
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
