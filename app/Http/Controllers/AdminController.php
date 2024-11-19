<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // Show the admin dashboard
    public function index()
    {
        return view('admin.dashboard');
    }

    // Manage users (show list of users)
    public function manageUsers()
    {
        $users = User::all(); // Fetch all users
        return view('admin.users', compact('users')); // Pass users to the view
    }

    // Update user roles (admin or user)
    public function updateUserRole(Request $request, User $user)
    {
        // Validate the role input
        $request->validate([
            'role' => 'required|in:user,admin', // Ensure 'role' is either 'user' or 'admin'
        ]);

        // Update the user's role
        $user->role = $request->role;
        $user->save();

        // Redirect back to the user management page with a success message
        return redirect()->route('admin.manageUsers')->with('success', 'User role updated successfully!');
    }

    public function someFunction()
{
    if (auth()->user()->hasRole('admin')) {
        // Perform admin actions
    }

    if (auth()->user()->can('edit articles')) {
        // Perform edit actions
    }
}

}
