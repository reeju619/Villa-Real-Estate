<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{

    public function showProfile()
    {
        // Corrected variable name from $admin to $user
        $user = Auth::guard('admin')->user();
        return view('admin.profile', compact('user'));
    }

    public function showEditProfileForm()
    {
        // Corrected variable name from $admin to $user
        $user = Auth::guard('admin')->user();
        return view('admin.edit-profile', compact('user')); // Ensure you create this view
    }

    public function update(Request $request)
{
    $user = Auth::guard('admin')->user();

    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email,'.$user->id,
        'password' => 'nullable|string|min:8|confirmed',
        'profile_image' => 'nullable|image|max:1024', // Max file size: 1MB
    ]);

    // Update the user's name and email
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    // Update the password if provided
    if ($request->filled('password')) {
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    }

    // Update the profile image if provided
    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        $user->update([
            'profile_image' => $imagePath,
        ]);
    }

    return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
}


}
