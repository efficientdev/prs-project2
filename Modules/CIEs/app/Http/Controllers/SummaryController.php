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
    	$photos=[
    		'Front view of the School with school gate',
			'classroom showing seating arrangement and white board',
			'Toilet facilities',
			'Laboratory (if available)'
    	];

        $report = Registration::findOrFail($reportId);
        return view('cies::summary', compact('report'));
    }
}
