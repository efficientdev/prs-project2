<?php

namespace Modules\ADMs\Http\Controllers;


use App\Http\Controllers\Controller; 
 
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ward;
use Spatie\Permission\Models\Role; 
use Modules\ADMs\Models\LgaAssignment;

class AssignLga extends Controller
{

	public function index1(){
		// Get all users that have the "CIE" role
		$cieUsers = User::role('CIE')->get();
	 	$lgas=Ward::select('lga_id', 'lga_name')->distinct()->get();
 
	} 
	
    public function index()
    {
        // Get all users that have the "CIE" role
        $cieUsers = User::role('CIE')->get();
        
        // Get all distinct LGAs
        $lgas = Ward::select('lga_id', 'lga_name')->distinct()->get();

        // Get existing assignments
        $assignments = LgaAssignment::with(['user', 'lga'])->get();

        return view('adms::assign-lga.index', compact('cieUsers', 'lgas', 'assignments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'lga_id'  => 'required|integer',
        ]);

        LgaAssignment::updateOrCreate(
            [
                'lga_id'  => $validated['lga_id'],
            ],
            [
                'user_id' => $validated['user_id'],
            ]
        );

        return back()->with('success', 'LGA assigned successfully.');
    }
}
