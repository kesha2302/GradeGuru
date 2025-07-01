<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\ClassName;
use App\Models\ClassPrice;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\ClassPass;

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
    }
    public function contact()
    {
        return view('ClientView.ContactUs');
    }

    public function classpriceshow($id)
    {
        $className = ClassName::findOrFail($id);

        $classprice = ClassPrice::where('class_id', $id)->get();


        return view('ClientView.classprice', compact('className', 'classprice'));
    }
}
