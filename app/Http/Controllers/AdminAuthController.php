<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
