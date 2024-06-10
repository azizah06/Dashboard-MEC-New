<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        // Return the login view
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        // Validate the login form
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        // Retrieve only the name and password from the request
        $credentials = $request->only('name', 'password');

        // Check if the user exists
        $user = User::where('name', $credentials['name'])->first();

        if (!$user) {
            // If the user doesn't exist, return to login with error
            return redirect('login')
                ->withInput()
                ->withErrors(['login_gagal' => 'Account does not exist.']);
        }

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // If successful, redirect to the intended location
            return redirect()->intended('/');
        }

        // If the password is incorrect, return to login with error
        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Invalid password.']);
    }

    public function register()
    {
        // Return the registration view
        return view('auth.register');
    }

    public function proses_register(Request $request)
    {
        // Validate the registration form
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // If validation fails, return to the registration view with errors
        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        // Hash the password before storing it
        $request['password'] = Hash::make($request->password);

        // Create the user
        User::create($request->all());

        // Redirect to the login page after successful registration
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        // Log the user out by clearing the session
        $request->session()->flush();

        // Use Auth's logout function
        Auth::logout();

        // Redirect to the login page
        return Redirect('login');
    }
}
