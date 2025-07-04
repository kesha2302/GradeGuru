<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Regularquestion;
use App\Models\Superquestion;

class QuestionTestController extends Controller
{
    public function questiontest($test_id, Request $request)
    {
        $test = Test::findOrFail($test_id);

        $regularQuestions = Regularquestion::where('test_id', $test_id)->get()->values();
        $superQuestions   = Superquestion::where('test_id', $test_id)->get()->values();

        $currentIndex = $request->session()->get('current_question_index', 0);
        $type = $request->session()->get('question_type', 'regular');

        if ($type === 'regular' && $currentIndex >= $regularQuestions->count()) {
            $currentIndex = 0;
            $type = 'super';
            $request->session()->put('question_type', 'super');
            $request->session()->put('current_question_index', 0);
        }

        if ($type === 'super' && $currentIndex >= $superQuestions->count()) {
            $request->session()->forget(['current_question_index', 'question_type']);
            return view('ClientView.Layouts.testcomplete', compact('test'));
        }

        $question = $type === 'regular' ? $regularQuestions[$currentIndex] : $superQuestions[$currentIndex];
        $totalQuestions = $type === 'regular' ? $regularQuestions->count() : $superQuestions->count();

        return view('ClientView.questiontest', compact(
            'test',
            'question',
            'currentIndex',
            'type',
            'totalQuestions'
        ));
    }

    public function submitAnswer($test_id, Request $request)
    {
        $request->validate([
            'answer' => 'required'
        ]);

        // Optional: Save answer in DB/session here

        $currentIndex = $request->session()->get('current_question_index', 0);
        $request->session()->put('current_question_index', $currentIndex + 1);

        return redirect()->route('question.test', $test_id);
    }
}
