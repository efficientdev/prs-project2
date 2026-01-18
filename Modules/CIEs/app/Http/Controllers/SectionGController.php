<?php

namespace Modules\CIEs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Modules\Registrations\Models\{RegistrationApproval,RegistrationApprovalStage};
use Modules\Registrations\Services\ApprovalService;

use Modules\Applications\Notifications\{ApplicantInputRequested,ApplicationStatusUpdated,ApplicationRestarted,ApplicationRejected};
use Modules\CIEs\Services\CieKonstants;//getPhotoList

class SectionGController extends CiesBaseController
{
    public function show(int $reportId)
    {
        $report = $this->findReportOrFail($reportId);
        $data = $report->getSection('sectionG') ?? [];
        $data2 = $report->getSection('sectionH') ?? [];


        $photos=CieKonstants::getPhotoList();

        return view('cies::report.section_g_form', compact('report', 'data','reportId','photos','data2'));
    }
    protected function findMissingKeys(array $keysToCheck, array $arrayToCheckAgainst): array {
        $missingKeys = [];

        foreach ($keysToCheck as $key) {
            if (!array_key_exists($key, $arrayToCheckAgainst)) {
                $missingKeys[] = $key;
            }
        }

        return $missingKeys;
    }


    public function store(Request $request, int $reportId)
    {
        $validated = $request->validate([
            'observations' => 'nullable|string|max:1000',
            'recommendations' => 'nullable|string|max:1000',
        ]);

        $storedFiles = [];



        $report = $this->findReportOrFail($reportId);

        /*if ($request->has('docs')) {
            # code...
            foreach ($request->file('docs') as $file) {
                $path = $file->store('attachments', 'public'); // saves to storage/app/public/attachments
                $storedFiles[] = $path; // Save the path to store in DB or return
            } 

            $m = $report->cies_reports ?? []; 
            $cData=$m['sectionG']??[];
            $v=[...$cData];

            $idocs=$v['docs']??[];
            $docs=array_merge($idocs,$storedFiles);
            $validated['docs']=$docs;
        
        }*/

        $photos=CieKonstants::getCompulsoryPhotoList();

        //$photos=CieKonstants::getPhotoList();

        $data2 = $report->getSection('sectionH') ?? [];
        //$data3 = array_keys($data2['uploads']??[]);
        $missing = $this->findMissingKeys($photos, $data2['uploads']??[]);

        $hasenough=CieKonstants::hasAtLeast3($data2['uploads']??[]);
        if ($hasenough) {}else{
            # code...
            $message="At least 3 photos are required for each photo upload category.";
            return back()->withErrors(['uploads' => $message]);
        }

        if (count($missing) !== 0) {
            $message = implode(', ', $missing) . (count($missing) === 1 ? " upload is required" : " uploads are required");
            //return back()->with('errors', $message);
            return back()->withErrors(['uploads' => $message]);
        }




        $this->saveSection($report, 'sectionG', $validated);

        $stage_id=RegistrationApprovalStage::where('role_name','CIE')->first()->id;

        /*$pendingapprovals=RegistrationApproval::where([
            'registration_id'=>$reportId,
            'registration_approval_stage_id'=>$stage_id,
            'status'=>'pending'
        ])->get(); 
        if ($pendingapprovals->count()>1) {
            # code...
            
        }else{*/
            
            $approval=RegistrationApproval::where([
                'registration_id'=>$reportId,
                'registration_approval_stage_id'=>$stage_id
            ])->first();

            (new ApprovalService)->approve($approval, auth()->user(), $request->observations??'n/a');
        //}



        /*if(isset($application->owner)){
            try {
                
        // Optionally notify applicant about restart
        $application->owner->notify(new ApplicationStatusUpdated($application,'Pending'));
            } catch (\Exception $e) {
                
            }
        }*/

        //

        return redirect()->route('cies.report.summary', $reportId);
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
