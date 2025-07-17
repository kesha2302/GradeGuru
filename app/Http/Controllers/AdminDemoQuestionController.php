<?php

namespace App\Http\Controllers;

use App\Models\DemoQuestion;
use App\Models\DemoTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminDemoQuestionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $query = DemoQuestion::with(['demotest']);


        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('question', 'LIKE', "%$search%");
                $q->orWhereHas('demotest', function ($subQuery) use ($search) {
                    $subQuery->where('title', 'LIKE', "%{$search}%");
                });
            });
        }

        $demoque = $query->paginate(5)->appends(['search' => $search]);

        return view('AdminPanel.demoque', compact('demoque', 'search'));
    }

    public function demoqueform()
    {
        $demoque = new DemoQuestion();
        $demotest = DemoTest::all();
        $url = url('/Admin/DemoQueform2');
        $title = "DemoQuestions Detail Form";
        $data = compact('url', 'title', 'demotest', 'demoque');

        return view('AdminPanel.demoqueform')->with($data);
    }

    public function demoqueform2(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'demotest' => 'required|exists:demo_tests,demo_id',
            'que_no' => 'required|integer',
            'question' => 'required|string',
            'option1' => 'required|string',
            'option2' => 'required|string',
            'option3' => 'required|string',
            'option4' => 'required|string',
            'answer' => 'required|string',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $demoque = new DemoQuestion();
        $demoque->demo_id = $request->input('demotest');
        $demoque->question_no = $request->input('que_no');
        $demoque->question = $request->input('question');
        $demoque->option1 = $request->input('option1');
        $demoque->option2 = $request->input('option2');
        $demoque->option3 = $request->input('option3');
        $demoque->option4 = $request->input('option4');
        $demoque->answer = $request->input('answer');
        $demoque->save();

        return redirect('/Admin/DemoQuestion');
    }


    public function demoqueedit($id)
    {
        $demoque = DemoQuestion::find($id);
        if (is_null($demoque)) {
            return redirect('/Admin/DemoQuestion');
        } else {
            $url = url('/Admin/DemoQue/update') . "/" . $id;
            $title = "Update DemoQuestion Details";
            $data = compact('demoque', 'url', 'title');
            return view('AdminPanel.demoqueform')->with($data);
        }
    }

    public function demoqueupdate($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'que_no' => 'required|integer',
            'question' => 'required|string',
            'option1' => 'required|string',
            'option2' => 'required|string',
            'option3' => 'required|string',
            'option4' => 'required|string',
            'answer' => 'required|string',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $demoque = DemoQuestion::find($id);
        $demoque->question_no = $request->input('que_no');
        $demoque->question = $request->input('question');
        $demoque->option1 = $request->input('option1');
        $demoque->option2 = $request->input('option2');
        $demoque->option3 = $request->input('option3');
        $demoque->option4 = $request->input('option4');
        $demoque->answer = $request->input('answer');
        $demoque->save();

        return redirect('/Admin/DemoQuestion');
    }

    public function demoquedelete($id)
    {
        $demoque = DemoQuestion::find($id);
        if (!is_null($demoque)) {
            $demoque->delete();
        }
        return redirect('/Admin/DemoQuestion');
    }
}
