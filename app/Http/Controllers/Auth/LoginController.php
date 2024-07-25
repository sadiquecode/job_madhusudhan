<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{

    protected $redirectTo = 'login-admin';

    public function showAdminLoginForm()
    {   
        if (auth()->check()) {
            return redirect('/dashboard');
        }

        $title = 'Admin Login Page';
        $description = 'Please login as an admisitrator to manage teachme.';
        $image = '';
        return view('auth.admin_login', get_defined_vars());
    }

        public function showLoginForm()
    {

        if (auth()->check()) {
            return redirect('/dashboard');
        }

        return redirect('login/admin');

        $title = 'Login';
        $description = 'Get access to the best tutors platform.';
        $image = '';
        return view('auth.weblogin', get_defined_vars());
    }

    public function login(Request $request)
    {   
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->email_verified_at) {
                if ($user->type === 'user') {
                    // User is a regular user, redirect to the home page
                    return redirect('profile/'.encrypt(Auth::user()->id));
                    // return redirect()->intended('/');
                } elseif ($user->type === 'admin') {
                    // User is an admin, redirect to the dashboard
                    return redirect()->intended('/dashboard');
                } else {
                    // Handle other roles as needed
                    return redirect()->intended('/dashboard');
                }
            } else {
                // User's email is not verified, logout and redirect back with an error
                Auth::logout();
                throw ValidationException::withMessages([
                    'message' => 'Your email address is not verified. Please verify your email to log in.'
                ])->redirectTo(route('login-admin'));
            }
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['message' => 'Invalid Credentials, Your provided Email or Password is incorrect ']);
        }
    }


        public function logout()
    {
        if (Auth::check()) {
            if (Auth::user()->type == 'admin') {
                Auth::logout();
                return redirect('login/admin');
            }
            Auth::logout();
        }
        return redirect('login/admin');
    }
}
