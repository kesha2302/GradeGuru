<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;
use Illuminate\Support\Facades\Validator;


class AdminAboutController extends Controller
{
    public function aboutus(Request $request)
    {
        $search = $request->input('search');

        $aboutdetail = Aboutus::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        })->get();

        return view('AdminPanel.aboutus', compact('aboutdetail', 'search'));
    }


    public function addAboutForm()
    {
        $aboutdetail = new \stdClass();
        $aboutdetail->title = '';
        $aboutdetail->description1 = '';
        $aboutdetail->description2 = '';
        $title = 'Add AboutUs';
        $url = url('/Admin/aboutus/store');

        return view('AdminPanel.addAbout', compact('aboutdetail', 'title', 'url'));
    }


    public function storeAbout(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description1' => 'required|string|max:1500',
            // 'description2' => 'required|string|max:1500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about = new Aboutus();
        $about->title = $request->input('title');
        $about->description1 = $request->input('description1');
        $about->description2 = $request->input('description2');
        $about->save();

        return redirect('/Admin/Aboutus')->with('success', 'AboutUs entry added successfully!');
    }


    public function editAboutForm($id)
    {
        $aboutdetail = Aboutus::find($id);
        if (is_null($aboutdetail)) {
            return redirect('/Admin/Aboutus')->with('error', 'Record not found!');
        }

        $title = "Update AboutUs";
        $url = url('/Admin/aboutus/update') . "/" . $id;

        return view('AdminPanel.addAbout', compact('aboutdetail', 'title', 'url'));
    }


    public function updateAbout($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description1' => 'required|string|max:1500',
            // 'description2' => 'required|string|max:1500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about = Aboutus::find($id);
        if (is_null($about)) {
            return redirect('/Admin/Aboutus')->with('error', 'Record not found!');
        }

        $about->title = $request->input('title');
        $about->description1 = $request->input('description1');
        $about->description2 = $request->input('description2');
        $about->save();

        return redirect('/Admin/Aboutus')->with('success', 'AboutUs entry updated successfully!');
    }


    public function deleteAbout($id)
    {
        $about = Aboutus::find($id);
        if (!is_null($about)) {
            $about->delete();
        }

        return redirect('/Admin/Aboutus')->with('success', 'AboutUs entry deleted successfully!');
    }
}
