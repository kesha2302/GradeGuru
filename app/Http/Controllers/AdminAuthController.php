<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function register()
    {

    }

    public function login()
    {
        return view('AdminPanel.login');
    }

    public function loginstore()
    {
        return view('AdminPanel.login');
    }
}
