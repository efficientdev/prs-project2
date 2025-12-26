<?php
//EditReport.php 
namespace Modules\PRSs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{PrvInsCategory,TRequirement};
use Modules\Registrations\Models\Registration;

use Modules\Registrations\Models\{RegistrationApproval,RegistrationApprovalStage};
use Modules\Registrations\Services\ApprovalService;

class EditReport extends PRSBaseController
{
	
    public function show(int $reportId)
    {
        $report = $this->findReportOrFail($reportId);
        $sectionA = $report->getPrs1('sectionA') ?? [];

        $proprietorSectionA = $report->getProprietorSection('sectionA') ?? [];

        $categories = collect(['' => 'Select Category'] + Category::pluck('category_name','id')->all()??[])->toArray();
        $lgas = collect(['' => 'Select Lga'] + Lga::pluck('lga_name','lga_id')->all()??[])->toArray();

        $formId = 'form-section-a';

        return view('prss::report.the_form', compact('report', 'sectionA', 'formId','reportId','categories','lgas','proprietorSectionA'));
    }


}