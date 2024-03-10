<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyDetail;

use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required|in:admin,editor,viewer',
        ];

        $messages = [
            'name.required' => 'Please Enter Your Name.',
            'email.required' => 'Please Enter Your Email.',
            'password.required' => 'Please Enter Your Password.',
            'password.confirmed' => 'Password does not match.',
            'user_type.required' => 'Please select a User Type.',
        ];

        $request->validate($rules, $messages);

        $imagePath = $request->file('profile_image')->store('profile_images', 'public');

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image' => $imagePath,
            'user_type' => $request->user_type,
        ]);

        return redirect()->route('admin.login')->with('success', 'Registration successful. Please login.');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember'); // Check if 'remember' is filled and true

        if (Auth::guard('admin')->attempt($credentials, $remember)) { // Pass $remember here
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => __('auth.failed'),
        ]);
    }


    public function dashboard(){{
        return view('admin.dashboard');
    }}

    /* New Change */
    public function showDashboard()
{
    // Fetch any necessary data for the dashboard
    $data = [];

    return view('admin.dashboard', $data);
}

public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    public function showForgotPasswordForm()
{
    return view('admin.forgot-password');
}


    public function showResetForm(Request $request, $token)
    {
        return view('admin.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $status == Password::PASSWORD_RESET
        ? redirect()->route('admin.login')->with('passwordResetSuccess', true)
        : back()->withErrors(['email' => [__($status)]]);

    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
                    ? back()->with('status', __($response))
                    : back()->withErrors(['email' => __($response)]);
    }

    protected function broker()
    {
        return Password::broker('admins');
    }
}


