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
            'contact'  => $request->contact,
        ]);

        return redirect()->route('login')->with('success', 'Account created! Please login.');
    }

    public function showLogin()
    {
        return view('ClientView.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->with('login_error', 'Invalid email or password')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        session()->forget(['current_question_index', 'answers']);
        session()->forget(['demo_answers']);
        return redirect()->route('login');
    }
}
