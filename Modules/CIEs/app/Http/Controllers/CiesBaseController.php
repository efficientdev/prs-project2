<?php

namespace Modules\CIEs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\CiesReport;
use Modules\Registrations\Models\Registration;


class CiesBaseController extends Controller
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
        $report->setSection($sectionKey, $data);
        $report->save();
    }
    protected function saveSection(Registration $report, string $sectionKey, array $data)
    {
        $report->setSection($sectionKey, $data);
        $report->save();
    }
    //

 
}
