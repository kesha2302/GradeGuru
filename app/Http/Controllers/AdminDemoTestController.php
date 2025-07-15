<?php

namespace App\Http\Controllers;

use App\Models\ClassName;
use App\Models\DemoTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminDemoTestController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $query = DemoTest::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%");
                $q->orWhereHas('classNames', function ($subQuery) use ($search) {
                    $subQuery->where('standard', 'LIKE', "%{$search}%");
                });
            });
        }

        $demotest = $query->paginate(5)->appends(['search' => $search]);

        return view('AdminPanel.demotest', compact('demotest', 'search'));
    }

    public function demotestform()
    {
        $demotest = new DemoTest();
        $class_names = ClassName::all();
        $url = url('/Admin/Demotestform2');
        $title = "DemoTest Detail Form";
        $data = compact('url', 'title', 'demotest', 'class_names');

        return view('AdminPanel.demotestform')->with($data);
    }

    public function demotestform2(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'class_names' => 'required|exists:class_names,class_id',
            'title' => 'required|string',
            'time' => 'required|string',
            'pass_marks' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $demotest = new DemoTest();
        $demotest->class_id = $request->input('class_names');
        $demotest->title = $request->input('title');
        $demotest->time = $request->input('time');
        $demotest->pass_marks = $request->input('pass_marks');
        $demotest->save();

        return redirect('/Admin/DemoTest');
    }


    public function demotestedit($id)
    {
        $demotest = DemoTest::find($id);
        if (is_null($demotest)) {
            return redirect('/Admin/DemoTest');
        } else {
            $url = url('/Admin/Demotest/update') . "/" . $id;
            $title = "Update DemoTest Details";
            $data = compact('demotest', 'url', 'title');
            return view('AdminPanel.demotestform')->with($data);
        }
    }

    public function demotestupdate($id, Request $request)
    {
        $demotest = DemoTest::find($id);
        $demotest->title = $request->input('title');
        $demotest->time = $request->input('time');
        $demotest->pass_marks = $request->input('pass_marks');
        $demotest->save();


        return redirect('/Admin/DemoTest');
    }

    public function demotestdelete($id)
    {
        $demotest = DemoTest::find($id);
        if (!is_null($demotest)) {
            $demotest->delete();
        }
        return redirect('/Admin/DemoTest');
    }
}
