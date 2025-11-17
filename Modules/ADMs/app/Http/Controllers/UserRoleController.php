<?php

namespace Modules\ADMs\Http\Controllers;


use App\Http\Controllers\Controller; 
 
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role; 

class UserRoleController extends Controller
{
    /**
     * Show user search and role management page.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        $users = User::when($query, function ($q) use ($query) {
            $q->where('name', 'like', "%$query%")
              ->orWhere('email', 'like', "%$query%");
        })->paginate(10);

        $roles = Role::pluck('name');

        return view('adms::users.index', compact('users', 'roles', 'query'));
    }

    /**
     * Assign a role to a user.
     */
    public function assignRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        $user = User::findOrFail($userId);
        $user->assignRole($request->role);

        return redirect()->back()->with('success', "Role '{$request->role}' assigned.");
    }

    /**
     * Remove a role from a user.
     */
    public function removeRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        $user = User::findOrFail($userId);
        $user->removeRole($request->role);

        return redirect()->back()->with('success', "Role '{$request->role}' removed.");
    }


    /**
     * Search for users by name or email.
     */
    public function searchUsers(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'LIKE', "%$query%")
                    ->orWhere('email', 'LIKE', "%$query%")
                    ->get();

        return response()->json($users);
    }

    /**
     * List roles for a specific user.
     */
    public function listUserRoles($userId)
    {
        $user = User::findOrFail($userId);
        $roles = $user->getRoleNames(); // returns a collection of role names

        return response()->json($roles);
    }

    /**
     * Assign a role to a user.
    
    public function assignRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        $user = User::findOrFail($userId);
        $user->assignRole($request->role);

        return response()->json(['message' => "Role '{$request->role}' assigned to user."]);
    } */

    /**
     * Remove a role from a user.
   
    public function removeRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        $user = User::findOrFail($userId);
        $user->removeRole($request->role);

        return response()->json(['message' => "Role '{$request->role}' removed from user."]);
    }  */
}
