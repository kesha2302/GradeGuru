<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function showRegister()
    {
        return view('ClientView.register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'contact'  => 'required|string|max:10',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'contact'  => $request->contact, // Save contact
        ]);

        return redirect()->route('login')->with('success', 'Account created! Please login.');
    }


    // Show login form
    public function showLogin()
    {
        return view('ClientView.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        session()->forget(['current_question_index', 'answers']);
        session()->forget(['demo_answers']);
        return redirect()->route('login');
    }
}
