<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function index(){
        return view('login');
    }


    public function store(Request $request)
    {
        // 1. Validate the form data
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // 2. Attempt to authenticate the user
        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            // If authentication fails, throw a validation exception
            // This will send the user back to the login form with an error message.
            throw ValidationException::withMessages([
                'username' => __('auth.failed'),
            ]);
        }

        // 3. If successful, regenerate the session to prevent session fixation
        $request->session()->regenerate();

        // 4. Redirect the user to their intended destination (or the dashboard)
        return redirect()->intended(route('user.dashboard'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Redirect to the homepage after logout
        return redirect('/');
    }
}
