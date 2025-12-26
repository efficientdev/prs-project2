<?php

namespace Modules\PRSs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\CIEs\Services\CieKonstants;//getPhotoList

class SectionDController extends PRSBaseController
{
    public function show(int $reportId)
    {
        $report = $this->findReportOrFail($reportId);

/*
        $uploadsO = $report->getSection('sectionH') ?? null;
        $uploads = $report->getPrs1('sectionD') ?? $uploadsO ?? null;*/
        $approved = $report->getPrs1('sectionD') ?? null;


        $data = [];// $report->getPrs1('sectionD') ?? [];

        $data2 = $report->getSection('sectionH') ?? [];


        $photos=CieKonstants::getPhotoList();

        return view('prss::report.section_d_form', compact('report', 'data','reportId','approved','photos','data2'));
    }

    public function store(Request $request, int $reportId)
    {
        $validated = $request->validate([
            'approval' => 'nullable|array',
        ]);
        $report = $this->findReportOrFail($reportId);

        /*$approval = collect($request->approval)
            ->map(fn ($v) => (bool) $v);*/

        //recreate structure to extract ids
        $docs=[];
        $data2 = $report->getSection('sectionH') ?? [];
        $photos= \Modules\CIEs\Services\CieKonstants::getPhotoList()??[]; 
        foreach($photos as $uploadItem){
            $data['docs']=$data2['uploads'][$uploadItem]??[];
            if(!empty($data['docs'])){
                foreach($data['docs'] as $doc){
                    $docs[]=$doc;
                }
            } 
        }

        $approvalInput = $validated['approval'] ?? [];

        $approval = collect($docs)->mapWithKeys(function ($doc) use ($approvalInput) {
            return [
                $doc => array_key_exists($doc, $approvalInput),
            ];
        });
        $this->saveSection($report, 'sectionD', [
            'approval'=>$approval
        ]);



        return redirect()->route('prss.sectionG.show', $report->id);
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
