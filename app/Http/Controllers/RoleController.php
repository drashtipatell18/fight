<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class RoleController extends Controller
{
    public function role()
    {
        $roles = Role::all();
        $user = auth()->user();
        return view('roles.view_role', compact('roles','user'));
    }

    public function roleCreate()
    {
        return view('roles.create_role');
    }

    public function roleStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Role::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('role')->with('success', 'Role created successfully.');
    }

    public function roleEdit($id)
    {
        $roles = Role::find($id);
        return view('roles.create_role', compact('roles'));
    }

    public function roleUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::find($id);
        $role->update([
            'name' => $request->input('name')
        ]);
        return redirect()->route('role')->with('success', 'Role updated successfully.');
    }

    public function roleDestroy($id)
    {
        $role = Role::find($id);
        $users = User::where('role_id', $role->id)->delete();
        if ($users) {
            $role->users()->delete();
        }
        $role->delete();

        return redirect()->route('role')->with('success', 'Role deleted successfully.');
    }
}
