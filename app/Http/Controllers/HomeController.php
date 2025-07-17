<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\ClassName;
use App\Models\ClassPrice;
use App\Models\DemoResult;
use App\Models\DemoTest;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
        $demotest = DemoTest::where('class_id', $id)->get();

        $attempts = [];

        if (Auth::check()) {
            $userId = Auth::id();

            foreach ($demotest as $dt) {
                $count = DemoResult::where('user_id', $userId)
                    ->where('demo_id', $dt->demo_id)
                    ->count();
                $attempts[$dt->demo_id] = $count;
            }
        }

        return view('ClientView.classprice', compact('className', 'classprice', 'demotest', 'attempts'));
    }
}
