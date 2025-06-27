<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
     return view('ClientView.index');
    }
       public function about()
    {
        $aboutdetail = Aboutus::all();
return view('ClientView.AboutUs', compact('aboutdetail'));
    //  return view('ClientView.AboutUs');
    }
       public function contact()
    {
     return view('ClientView.ContactUs');
    }
}
