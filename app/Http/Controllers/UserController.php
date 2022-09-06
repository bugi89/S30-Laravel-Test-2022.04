<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users,email',
            'full_name' => 'required',
            'role' => 'required|exists:roles,name',
        ]);

        $user = new User([
            'email' => $validated['email'],
            'name' => $validated['full_name'],
            'password' => Str::random(16),
        ]);
        $user->save();

        /** @var Role $role */
        $role = Role::whereName($validated['role'])->first();
        $role->users()->attach([$user->id]);
    }


    public function show(Request $request)
    {
        $validated = $request->validate([
            'roles' => 'required|exists:roles,name',
        ]);

        return User::filterByRoles($validated['roles'])->get();
    }
}
