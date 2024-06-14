<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function read()
    {
        $users = User::all();


        return view('users.index', ['users' => $users]);
    }

    public function create()
    {

        // dd($request->all());
        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'dob' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'date_of_birth' => $request->dob,
            'email' => $request->email,
            'role_id' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/users');
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        $roles = Role::all();
        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $userId)
    {
        $user = User::find($userId);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'dob' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'role' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'date_of_birth' => $request->dob,
            'email' => $request->email,
            'role_id' => $request->role,
            'password' => Hash::make($request->password),
        ];

        if (!empty($request->password)) {
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);

        return redirect('/users');
    }

    public function destroy($userId)
    {
        // Check if a user is logged in and if they are trying to delete themselves
        if (Auth::check() && Auth::user()->id == $userId) {
            abort(403, 'You are not able to delete yourself.');
        } else {
            $user = User::find($userId);
            if ($user) {
                // Delete all comments of the user
                $user->comment()->delete();
                // Then delete the user
                $user->delete();
            }
            return redirect()->back();
        }
    }
}
