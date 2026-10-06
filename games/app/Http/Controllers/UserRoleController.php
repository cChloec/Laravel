<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::where('guard_name', 'web')->get();

        return view('user-roles.index', compact('users', 'roles'));
    }

    public function update(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $role = $request->input('role');

        if ($role) {
            $user->syncRoles([$role]);
        } else {
            $user->syncRoles([]);
        }

        return redirect()->route('user-roles.index')
            ->with('success', 'Rol van de gebruiker gewijzigd!');
    }
}