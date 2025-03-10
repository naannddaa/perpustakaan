<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login'); // Make sure the view exists (login.blade.php)
    }

    // Handle login
    public function authenticate(Request $request)
    {
        // Validate the login form
        $credentials = $request->validate([
            'nik' => ['required', 'numeric'], // Assuming NIK is a number
            'password' => ['required'],
        ]);

        // Attempt to login the user
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent session fixation
            $request->session()->regenerate();

            // Redirect the user to their intended destination or dashboard
            return redirect()->intended('dashboard');
        }

        // If login fails, redirect back with an error message
        return back()->withErrors([
            'nik' => 'The provided credentials do not match our records.',
        ])->onlyInput('nik');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
