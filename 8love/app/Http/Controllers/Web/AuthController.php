<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }


    
    public function loginAction(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required', // Remove the 'password' rule here
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success','Login successful');
        }
    
        throw ValidationException::withMessages([
            'email' => 'These credentials do not match our records.',
        ]);
    }
    

    public function register(){
        return view('auth.register');
    }

    public function registerAction(Request $request) {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'country' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',  // Removed |confirmed rule
        ]);
        
    
        // Create the user
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_name' => $request->user_name,
            'phone' => $request->phone,
            'country' => $request->country,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Set a success message in the session
        Session::flash('success', 'You have successfully registered');
    
        // Redirect to the login view with a success message
        return redirect()->route('login_view');
    }
    
}