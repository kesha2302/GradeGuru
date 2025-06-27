<?php

namespace App\Http\Controllers;

use App\Models\ClassPrice;
use App\Models\Superquestion;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminSuperQueController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $query = Superquestion::with(['classPrice', 'tests']);


        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('question', 'LIKE', "%$search%");
                $q->orWhereHas('classPrice', function ($subQuery) use ($search) {
                    $subQuery->where('title', 'LIKE', "%{$search}%");
                });
            });
        }

        $superque = $query->paginate(5)->appends(['search' => $search]);

        return view('AdminPanel.superque', compact('superque', 'search'));
    }

    public function superqueform()
    {
        $superque = new Superquestion;
        $class_price = ClassPrice::all();
        $test = Test::all();
        $url = url('/Admin/SuperQueform2');
        $title = "SuperQuestions Detail Form";
        $data = compact('url', 'title', 'class_price', 'superque');

        return view('AdminPanel.superqueform')->with($data);
    }

    public function getTestsByClass($cp_id)
    {
        $tests = Test::where('cp_id', $cp_id)->get();
        return response()->json($tests);
    }

    public function superqueform2(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'class_price' => 'required|exists:class_prices,cp_id',
            'test' => 'required|exists:test,test_id',
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

        $superque = new Superquestion();
        $superque->cp_id = $request->input('class_price');
        $superque->test_id = $request->input('test');
        $superque->question_no = $request->input('que_no');
        $superque->question = $request->input('question');
        $superque->option1 = $request->input('option1');
        $superque->option2 = $request->input('option2');
        $superque->option3 = $request->input('option3');
        $superque->option4 = $request->input('option4');
        $superque->answer = $request->input('answer');
        $superque->save();

        return redirect('/Admin/SuperQuestions');
    }


    public function superqueedit($id)
    {
        $superque = Superquestion::find($id);
        if (is_null($superque)) {
            return redirect('/Admin/SuperQuestions');
        } else {
            $url = url('/Admin/SuperQue/update') . "/" . $id;
            $title = "Update SuperQuestion Details";
            $data = compact('superque', 'url', 'title');
            return view('AdminPanel.superqueform')->with($data);
        }
    }

    public function superqueupdate($id, Request $request)
    {
        $superque = Superquestion::find($id);
        $superque->question_no = $request->input('que_no');
        $superque->question = $request->input('question');
        $superque->option1 = $request->input('option1');
        $superque->option2 = $request->input('option2');
        $superque->option3 = $request->input('option3');
        $superque->option4 = $request->input('option4');
        $superque->answer = $request->input('answer');
        $superque->save();


        return redirect('/Admin/SuperQuestions');
    }

    public function superquedelete($id)
    {
        $superque = Superquestion::find($id);
        if (!is_null($superque)) {
            $superque->delete();
        }
        return redirect('/Admin/SuperQuestions');
    }
}
