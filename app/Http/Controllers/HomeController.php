<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\ClassName;
use App\Models\ClassPrice;
use App\Models\DemoTest;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
     public function inquirystore(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'email' => 'required|string',
        'message' => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $inquiry = new Inquiry();
    $inquiry->name = $request->input('name');
    $inquiry->email = $request->input('email');
    $inquiry->message = $request->input('message');
    $inquiry->save();

    return redirect()->back()->with('success', 'Successfully submited the form');
    }

    public function classpriceshow($id)
    {
        $className = ClassName::findOrFail($id);

        $classprice = ClassPrice::where('class_id', $id)->get();
        $demotest = DemoTest::where('class_id',$id)->get();

        return view('ClientView.classprice', compact('className', 'classprice', 'demotest'));
    }
}
