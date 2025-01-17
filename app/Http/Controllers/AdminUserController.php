<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController  extends Controller
{
    // Display a listing of the users
    public function index()
    {
        // Fetch all users
        $users = User::all();
        return view('pages.user.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('pages.user.create');
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);

        // Create new user
        $user = new User;
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->role = $request->role;  // Assuming you have a 'role' field
        $user->save();

        return redirect('/User')->with('success', 'User created successfully');
    }

    // Display the specified user
    public function show($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
        return view('pages.user.show', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    // Update the specified user in storage
    public function update(Request $request, $id)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Find and update the user
        $user = User::findOrFail($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if ($request->has('password') && !empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $user->role = $request->role;  // Update role if necessary
        $user->save();

        return redirect('/User')->with('success', 'User updated successfully');
    }

    // Remove the specified user from storage
    public function delete($id)
    {
        // Find and delete the user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/User')->with('success', 'User deleted successfully');
    }
}
