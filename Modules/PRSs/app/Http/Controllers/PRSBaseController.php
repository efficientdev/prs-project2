<?php
//PRSBaseController.php

namespace Modules\PRSs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Registrations\Models\Registration;


class PRSBaseController extends Controller
{
    protected function findReportOrFail(int $id): Registration
    {
        \Illuminate\Support\Facades\Session::put("fid", $id);
        return Registration::findOrFail($id);
    }

    /**
     * Save a section’s data to the JSON column.
     */
    protected function saveSectionData(Registration $report, string $sectionKey, array $data)
    {
        $report->setPrs1($sectionKey, $data);
        $report->save();
    }
    protected function saveSection(Registration $report, string $sectionKey, array $data)
    {
        $report->setPrs1($sectionKey, $data);
        $report->save();
    }
    //

 
}
