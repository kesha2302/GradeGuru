<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regularquestion;
use App\Models\ClassPrice;
use App\Models\Test;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminRegularQueController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Regularquestion::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('question', 'LIKE', "%$search%")
                  ->orWhereHas('classPrice', function ($subQuery) use ($search) {
                      $subQuery->where('title', 'LIKE', "%{$search}%");
                  });
            });
        }

        $regularque = $query->paginate(5)->appends(['search' => $search]);
        return view('AdminPanel.regularque', compact('regularque', 'search'));
    }


    public function addRegularQueForm()
    {
        $regulerque = new Regularquestion();
        $class_price = ClassPrice::all();
        $test = Test::all();

        $title = 'Add Regular Question';
        $url = url('/Admin/RegularQue/store');

        return view('AdminPanel.addregularque', compact('regulerque', 'title', 'url', 'class_price', 'test'));
    }




    public function storeRegularQue(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_price' => 'required|exists:class_prices,cp_id',
            'test' => 'required|exists:test,test_id',
            'question_no' => 'required|integer',
            'question' => 'required|string|max:255',
            'option1' => 'required|string|max:255',
            'option2' => 'required|string|max:255',
            'option3' => 'required|string|max:255',
            'option4' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $regulerque = new Regularquestion();
        $regulerque->cp_id = $request->input('class_price');
        $regulerque->test_id = $request->input('test');
        $regulerque->question_no = $request->input('question_no');
        $regulerque->question = $request->input('question');
        $regulerque->option1 = $request->input('option1');
        $regulerque->option2 = $request->input('option2');
        $regulerque->option3 = $request->input('option3');
        $regulerque->option4 = $request->input('option4');
        $regulerque->answer = $request->input('answer');
        $regulerque->save();

        return redirect('/Admin/RegularQuestions')->with('success', 'Regular Question entry added successfully!');
    }

   public function getTestsByClass($cp_id)
{
    $test = Test::where('cp_id', $cp_id)->get();
    return response()->json($test);
}

    public function editRegularqueForm($id)
    {
        $regulerque = Regularquestion::find($id);
        if (is_null($regulerque)) {
            return redirect('/Admin/RegularQuestions')->with('error', 'Record not found!');
        }

        $title = "Update Regular Question";
        $url = url('/Admin/RegularQue/update') . "/" . $id;

        return view('AdminPanel.addregularque', compact('regulerque', 'title', 'url'));
    }

    public function updateRegularque($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question_no' => 'required|integer',
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

        $regulerque = Regularquestion::find($id);
        if (is_null($regulerque)) {
            return redirect('/Admin/RegularQuestions')->with('error', 'Record not found!');
        }

        $regulerque->question_no = $request->input('question_no');
        $regulerque->question = $request->input('question');
        $regulerque->option1 = $request->input('option1');
        $regulerque->option2 = $request->input('option2');
        $regulerque->option3 = $request->input('option3');
        $regulerque->option4 = $request->input('option4');
        $regulerque->answer = $request->input('answer');
        $regulerque->save();

        return redirect('/Admin/RegularQuestions')->with('success', 'Regular Question updated successfully!');
    }

    public function deleteRegularque($id)
    {
        $regulerque = Regularquestion::find($id);
        if (!is_null($regulerque)) {
            $regulerque->delete();
        }

        return redirect('/Admin/RegularQuestions')->with('success', 'Regular Question entry deleted successfully!');
    }
}
