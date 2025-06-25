<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminRegister;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function register(Request $request)
    {
        return view('AdminPanel.register');
    }

    public function login()
    {

    }
}
