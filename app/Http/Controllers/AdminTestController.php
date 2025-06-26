<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\ClassPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminTestController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $query = Test::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%");
                $q->orWhereHas('classPrice', function ($subQuery) use ($search) {
                    $subQuery->where('title', 'LIKE', "%{$search}%");
                });
            });
        }

        $test = $query->paginate(10)->appends(['search' => $search]);

        return view('AdminPanel.test', compact('test', 'search'));
    }

    public function testform()
    {
        $test = new Test;
        $class_price = ClassPrice::all();
        $url = url('/Admin/Testform2');
        $title = "Test Detail Form";
        $data = compact('url', 'title', 'class_price','test');

        return view('AdminPanel.testform')->with($data);
    }

    public function testform2(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'class_price' => 'required|exists:class_prices,cp_id',
            'title' => 'required|string',
            'que_type' => 'required|string',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $test = new Test();
        $test->cp_id = $request->input('class_price');
        $test->title = $request->input('title');
        $test->que_type = $request->input('que_type');
        $test->save();

        return redirect('/Admin/Test');
    }


    public function testedit($id)
    {
        $test = Test::find($id);
        if (is_null($test)) {
            return redirect('/Admin/Tests');
        } else {
            $url = url('/Admin/Test/update') . "/" . $id;
            $title = "Update Test Details";
            $data = compact('test', 'url', 'title');
            return view('AdminPanel.testform')->with($data);
        }
    }

    public function testupdate($id, Request $request)
    {
        $test = Test::find($id);
        $test->title = $request->input('title');
        $test->que_type = $request->input('que_type');
        $test->save();

        return redirect('/Admin/Test');
    }

    public function testdelete($id)
    {
        $test = Test::find($id);
        if (!is_null($test)) {
            $test->delete();
        }
        return redirect('/Admin/Test');
    }

}
