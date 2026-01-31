<?php

namespace Modules\PRSs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\CIEs\Services\CieKonstants;//getPhotoList

use Modules\Registrations\Models\{RegistrationApproval,RegistrationApprovalStage};
use App\Models\User;

use Modules\PRSs\Notifications\{CieReUpload};

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
            'rejected' => 'nullable|array',
            'reasons' => 'nullable|array', 
            'reasons.*' => 'nullable|string',
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
                $doc =>boolval($approvalInput[$doc])
                //$doc => array_key_exists($doc, $approvalInput),
            ];
        });

        $r1=[];
        foreach ($approval as $key => $value) {
            # code...
            $r1[$key]=!$value;//invert the values
        }
        $rejected=collect($r1);

        /*$rejectedInput = $validated['rejected'] ?? [];

        $rejected = collect($docs)->mapWithKeys(function ($doc) use ($rejectedInput) {
            return [
                $doc => array_key_exists($doc, $rejectedInput),
            ];
        }); */
        
        $reasonsInput = $validated['reasons'] ?? [];

        $reasons = collect($docs)->mapWithKeys(function ($doc) use ($reasonsInput) {
            $reason = trim($reasonsInput[$doc] ?? '');

            return [
                $doc => $reason !== '' ? $reason : null,
            ];
        });

        /*$reasons = collect($docs)->mapWithKeys(function ($doc) use ($reasonsInput) {
            return [
                $doc => array_key_exists($doc, $reasonsInput),
            ];
        });*/

        $rejectionsWithoutReason=0;
        foreach ($rejected as $key => $value) {
            # code...
            if($value){
                //only if trully rejected
                if (isset($reasons[$key]) && !empty($reasons[$key])) {
                    # this rejection has a reason
                }else{
                    $rejectionsWithoutReason++;
                }
            }else{
                unset($reasons[$key]);
            }
        }
        $approval_counts = collect($approval)->countBy(fn ($value) => $value ? 'yes' : 'no');
        $approvalCount = $approval_counts->get('yes', 0);

        $rejected_counts = collect($rejected)->countBy(fn ($value) => $value ? 'yes' : 'no');
        $rejectedCount = $rejected_counts->get('yes', 0);

        $total=$approvalCount+$rejectedCount;// count($rejected)+count($approval);
        $total2=count($docs);

        $ra1=RegistrationApproval::where('registration_id',$reportId)
            ->where('registration_approval_stage_id',RegistrationApprovalStage::where('role_name','CIE')->first()->id)
            //->with('user')
            ->first();

            //dd([$rejectionsWithoutReason,$total,$total2,$approvalCount,$rejectedCount,$rejected]);


        $this->saveSection($report, 'sectionD', [
            'approval'=>$approval,
            'rejected'=>$rejected,
            'reasons'=>$reasons
        ]);

        if ($rejectionsWithoutReason==0 && $total==$total2) {
            # code...

            $files=$reasons->toArray();
            if (count($rejected)!=0) {
                # code... notify cie and proprietor
                if($ra1){
                    $cie=User::find($ra1->user_id);
                    if ($cie) { 
                        $extraText="Visit ".route('cies.sectionG.show', $report->id)." to replace the problematic uploads for this registration, you should delete the problematic uploads, before uploading new ones.";
                        $cie->notify(new CieReUpload($files,$extraText));
                    }
                }

                $proprietor=User::find($report->owner_id);
                if ($proprietor) { 
                    $proprietor->notify(new CieReUpload($files));
                }
                return back()->withErrors([
                    'rejections' => 'The CIE and proprietor have been informed.'
                ])->withInput();
                /*
                return redirect()->back()->with(
                    'success',
                    'The CIE and proprietor have been informed.'
                );*/

                
            }else{


                return redirect()->route('prss.sectionG.show', $report->id);
            }
        }else{
            /*return redirect()->back()->with('error','All Rejections must have a reason, also check that you check all those you don\'t wish to reject');*/
            return back()->withErrors([
                'rejections' => 'All Rejections must have a reason, also check that you check all those you don\'t wish to reject.'
            ])->withInput();

        }
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
