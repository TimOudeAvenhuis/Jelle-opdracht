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


        // Check if request is emtpy, then cancel
        if (empty(request()->all())) {
            abort(400, 'Missing required fields.');
        }
        // Allow empty in validation rules
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,' . $userId,
            'dob' => 'nullable|date',
            'email' => 'nullable|email|unique:users,email,' . $userId,
            'password' => 'nullable|string|min:8|max:20',
            'role_id' => 'nullable'
        ]);

        // Dont save stuff as empty, do not update those fields
        $dataToUpdate = array_filter($validatedData, function ($value) {
            return ($value !== null);
        });


        $user = User::find($userId);
        $user->update($dataToUpdate);

        return redirect('/users');
    }

    public function destroy($userId)
    {
        $user = User::find($userId);

        // Then delete the user
        $user->delete();

        return redirect()->back();

    }
}
