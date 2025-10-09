<?php
// app/Http/Controllers/SummaryController.php
namespace Modules\CIEs\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Registrations\Models\Registration;

class SummaryController extends Controller
{
    public function show(int $reportId)
    {
        $report = Registration::findOrFail($reportId);
        return view('cies::summary', compact('report'));
    }
}
