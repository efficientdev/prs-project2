<?php
namespace Modules\PrivateValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use Modules\PrivateValidations\Models\PrivateValidation; // Assume this is your model that holds the whole form data 
use Illuminate\Support\Facades\Session;

    use Illuminate\Support\Facades\Storage;

use App\Models\{City,Lga,SchoolSector,Ward};
  

class PRScontroller extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['school_name', 'lga_id', 'ward_id', 'school_level', 'school_category']);

        $lgas  = Ward::select('lga_id', 'lga_name')->distinct()->get();
        $wards = Ward::select('ward_id', 'ward_name', 'lga_id')->get();

        //->query()
        $forms = PrivateValidation::where('submitted',true)
            ->when($filters['school_name'] ?? null, function ($q, $v) {
                $q->where('data->sectionA->school_name', 'LIKE', "%$v%");
            })
            ->when($filters['lga_id'] ?? null, function ($q, $v) {
                $q->where('data->sectionA->lga_id', $v);
            })
            ->when($filters['ward_id'] ?? null, function ($q, $v) {
                $q->where('data->sectionA->ward_id', $v);
            })
            ->when($filters['school_level'] ?? null, function ($q, $v) {
                $q->where('data->sectionA->school_level', $v);
            })
            ->when($filters['school_category'] ?? null, function ($q, $v) {
                $q->where('data->sectionA->school_category', $v);
            })
            ->latest()
            ->paginate(10)
            ->appends($filters);

        return view("privatevalidations::prs.index", compact('forms', 'filters', 'lgas', 'wards'));
    }
 
}
