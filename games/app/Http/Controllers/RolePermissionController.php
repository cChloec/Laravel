<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::where('guard_name', 'web')->get();
        $permissions = Permission::where('guard_name', 'web')->get();

        return view('role-permissions.index', compact('roles', 'permissions'));
    }

    public function update(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);

        $permissions = $request->input('permissions', []);

        $role->syncPermissions($permissions);

        return redirect()->route('role-permissions.index')
            ->with('success', 'Permissies van de rol gewijzigd!');
    }
}