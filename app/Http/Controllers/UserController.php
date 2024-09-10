<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function users()
    {
        $users = User::with('role')->get();
        return view('users.view_user', compact('users'));
    }
    public function userCreate()
    {
        $roles = Role::pluck('name', 'id')->unique();
        return view('users.create_user', compact('roles'));
    }

    public function userInsert(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
            'gender'   => 'required',
            'dob'      => 'required',
            'role_id'  => 'required',
        ]);

        $filename = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }

        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => bcrypt($request->input('password')),
            'phone'     => $request->input('phone'),
            'gender'     => $request->input('gender'),
            'dob'        => $request->input('dob'),
            'role_id'   => $request->input('role_id'),
            'image'     => $filename,
        ]);

        session()->flash('success', 'User added successfully!');
        return redirect()->route('user');
    }

    public function userEdit($id)
    {
        $users = User::find($id);
        $roles = Role::pluck('name', 'id')->unique();
        return view('users.create_user', compact('users', 'roles'));
    }

    public function userUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender'   => 'required',
            'dob'      => 'required',
            'role_id' => 'required',
        ]);

        $users = User::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
            $users->image = $filename;
        }

        $users->update([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'phone'     => $request->input('phone'),
            'gender'     => $request->input('gender'),
            'dob'        => $request->input('dob'),
            'role_id'   => $request->input('role_id'),
        ]);

        session()->flash('success', 'User Update successfully!');
        return redirect()->route('user');
    }

    public function userDestroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
        session()->flash('danger', 'User Delete successfully!');
        return redirect()->back();
    }

    // public function myProfile()
    // {
    //     if (Auth::check()) {
    //         $userid = Auth::user()->id;
    //         $users = User::with('role')->find($userid);
    //     }
    //     $roles = Role::pluck('name', 'id')->unique();
    //     return view('user.user_profile', compact('users', 'roles'));
    // }

    // public function editProfile($id)
    // {
    //     if (Auth::check()) {
    //         $users = User::find($id);
    //     }
    //     return view('admin.user_profile', compact('users'));
    // }

    // public function Profileupdate(Request $request, $id)
    // {

    //     $request->validate([
    //         'name' => 'required',
    //         'email'  => 'required',
    //     ]);

    //     $users = User::find($id);

    //     $flag = false;
    //     $filename = "";

    //     if ($request->hasFile('newimage')) {
    //         $image = $request->file('newimage');
    //         $filename = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move('images', $filename);
    //         $users->image = $filename;

    //         $flag = true;
    //     }
    //     if (!$flag) {
    //         $users->update([
    //             'name'      => $request->input('name'),
    //             'email'     => $request->input('email'),
    //             'role_id'   => $request->input('role_id'),
    //         ]);
    //     } else {
    //         $users->update([
    //             'name'      => $request->input('name'),
    //             'email'     => $request->input('email'),
    //             'role_id'   => $request->input('role_id'),
    //             'image' => $filename
    //         ]);
    //     }
    //     return redirect()->route('myprofile')->with('success', 'Profile updated successfully');
    // }
}
