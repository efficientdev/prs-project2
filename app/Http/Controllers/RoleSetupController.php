<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Spatie\Permission\Models\Role;

class RoleSetupController extends Controller
{
    /**
     * Create roles from a predefined list if they don't already exist.
     */
    public function setupRoles()
    {
        $roles = [
            'admin',
            'proprietor',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Roles have been checked and created where necessary.',
        ]);
    }
}
