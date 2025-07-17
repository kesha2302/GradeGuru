<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminRegister;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function register()
    {
        return view('AdminPanel.register');
    }

    public function login()
    {
        return view('AdminPanel.login');
    }

    public function storeRegister(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $register = new AdminRegister();
        $register->name = $request->input('name');
        $register->email = $request->input('email');
        $register->password = Hash::make($request->input('password'));
        $register->save();

        return redirect('/AdminLogin')->with('success', 'Register added successfully!');
    }

    public function loginstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();
            $request->session()->put('admin_id', $user->admin_id);
            return redirect('/Admin')->with([
                'success' => 'Login successful!',
                'username' => $user->name
            ]);
        }


        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_id');
        Auth::guard('admin')->logout();
        return redirect('/AdminLogin');
    }
}
