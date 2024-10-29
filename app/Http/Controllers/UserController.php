<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('home', compact('users'));
    }
    public function create() {
        return view('users.create');
    }
    public function store(Request $request) {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'userPrivilege' => 'required|integer',
            'phone' => 'required|string|max:255'
        ]);

        User::create([
            'fullname' => $request->name,
            'email' => $request->email,
            'userPrivilege' => $request->userPrivilege,
            'phone' => $request->phone
        ]);

        return redirect()->route('home')->with('success', 'User created successfully');
    }
    public function edit($id) {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'userPrivilege' => 'required|integer',
            'phone' => 'required|string|max:255'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('home')->with('success', 'User updated successfully');
    }
    public function destroy($id) {
        User::findOrFail($id)->delete();
        return redirect()->route('home')->with('success', 'User deleted successfully');
    }
}
