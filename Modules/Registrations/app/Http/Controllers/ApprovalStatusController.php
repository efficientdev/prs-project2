<?php

namespace Modules\Registrations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Registrations\Models\{Application,Registration};
use Modules\Registrations\Models\RegistrationApproval;
use Modules\Registrations\Models\RegistrationApprovalStage;
use Modules\Registrations\Services\ApprovalService;
 
use App\Models\{Category,Lga,Ward};

use Modules\ADMs\Models\LgaAssignment;

class ApprovalStatusController extends Controller
{
    public function myApprovals(Request $request)
    {
  
        /*$approvals = RegistrationApproval::with('application', 'stage')
            ->whereHas('stage.users', fn($q) => $q->where('user_id', auth()->id()))
            ->where('status', 'pending')
            ->paginate(10);*/

        $lga_id=0;
        if (auth()->user()->hasRole('CIE')) { 
            try { 
                $lga_id=LgaAssignment::where('user_id',auth()->user()->id)->first()->lga_id;
            } catch (\Exception $e) {
                
            }
        }

        $q=Registration::with('latestStage.stage');//->query();
        if (in_array('CIE', auth()->user()->roles->pluck('name')->toArray())) {
            $q->where('data->sectionA->school_lga_id',$lga_id);
        }
        if ($request->filled('name')) {
            $q->where('data->sectionA->proposed_name', 'LIKE', '%' . $request->name . '%');
        } 
        $q->whereHas('latestStage', function ($q) use ($request) {
            //$q->where('status', 'published');
            if ($request->filled('stage_id')) {
                $q->where('registration_approval_stage_id', $request->stage_id)
                ->whereNotIn('registration_approval_stage_id',ApprovalService::$onlyForProprietors);
            }
        });

        $approvals=$q->paginate(10)->withQueryString();

         
        
        $stages=RegistrationApprovalStage::all();

        return view('registrations::approvals.current_sch_status', compact('approvals','stages'));
    }
 
       
 

}
