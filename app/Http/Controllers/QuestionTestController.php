<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Regularquestion;
use App\Models\Superquestion;
use Illuminate\Support\Facades\Log;

class QuestionTestController extends Controller
{

    public function questiontest($test_id, Request $request)
{
    $test = Test::findOrFail($test_id);
    $regularQuestions = Regularquestion::where('test_id', $test_id)->get()->values();
    $superQuestions   = Superquestion::where('test_id', $test_id)->get()->values();

    $currentIndex = $request->session()->get('current_question_index', 0);
    $type = $request->session()->get('question_type', 'regular');

    // Handle completion
    if ($type === 'regular' && $currentIndex >= $regularQuestions->count()) {
        $request->session()->forget(['current_question_index', 'question_type']);
        // return view('ClientView.result', compact('test'));
        return redirect()->route('test.result', $test_id);
    }

    if ($type === 'super' && $currentIndex >= $superQuestions->count()) {
        $request->session()->forget(['current_question_index', 'question_type']);
        // return view('ClientView.result', compact('test'));
        return redirect()->route('test.result', $test_id);
    }

    $question = $type === 'regular' ? $regularQuestions[$currentIndex] : $superQuestions[$currentIndex];
    $totalQuestions = $type === 'regular' ? $regularQuestions->count() : $superQuestions->count();

    $answers = $request->session()->get('answers', []);
    $selected = $answers[$question->question_id] ?? null;

    return view('ClientView.questiontest', compact(
        'test',
        'question',
        'currentIndex',
        'type',
        'totalQuestions',
        'selected'
    ));
}

    public function submitAnswer($test_id, Request $request)
{
    Log::info('SubmitAnswer called');

         $request->validate([
            'answer' => 'required'
        ]);

        // Optional: Save answer in DB/session here

        $currentIndex = $request->session()->get('current_question_index', 0);
        $request->session()->put('current_question_index', $currentIndex + 1);

        //    $questionId = $request->input('question_no');
        $questionId = $request->input('rq_id') ?? $request->input('sq_id');
    $answer = $request->input('answer');

    // Store answer in session
    $answers = $request->session()->get('answers', []);
    $answers[$questionId] = $answer;
    $request->session()->put('answers', $answers);

        return redirect()->route('question.test', $test_id);
}


    public function result($test_id, Request $request)
{
    $test = Test::findOrFail($test_id);
    $answers = $request->session()->get('answers', []);

     $questionIds = array_keys($answers);

     $regularQuestions = \App\Models\Regularquestion::whereIn('rq_id', $questionIds)->get()->keyBy('rq_id');
    $superQuestions   = \App\Models\Superquestion::whereIn('sq_id', $questionIds)->get()->keyBy('sq_id');
    // Merge both types (you can distinguish them later if needed)
    $allQuestions = $regularQuestions->merge($superQuestions);

    // Optional: clear session if test is over
    // $request->session()->forget(['current_question_index', 'answers']);

    return view('ClientView.result', compact('test', 'answers','allQuestions'));
}

}
