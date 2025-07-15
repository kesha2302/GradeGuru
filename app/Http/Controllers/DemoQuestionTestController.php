<?php

namespace App\Http\Controllers;

use App\Models\DemoQuestion;
use App\Models\DemoTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DemoQuestionTestController extends Controller
{
    public function questiontest($demo_id, Request $request)
    {
        $test = DemoTest::findOrFail($demo_id);

        $questions = DemoQuestion::where('demo_id', $demo_id)->orderBy('question_no')->get()->values();
        $currentIndex = (int) $request->input('index', 0);

        if ($currentIndex < 0) {
            $currentIndex = 0;
        } elseif ($currentIndex >= $questions->count()) {
            $currentIndex = $questions->count() - 1;
        }

        $question = $questions[$currentIndex];
        $totalQuestions = $questions->count();
        $selected = null;

        return view('ClientView.demoquestion', compact(
            'test',
            'questions',
            'question',
            'currentIndex',
            'totalQuestions',
            'selected'
        ));
    }

    public function testsubmit($demo_id, Request $request)
    {
        $selectedAnswer = $request->input('answer', '-');
        $currentIndex = (int) $request->input('index', 0);
        $direction = $request->input('direction', 'next');

        $questions = DemoQuestion::where('demo_id', $demo_id)->orderBy('question_no')->get()->values();

        // Guard: invalid index
        if ($currentIndex < 0 || $currentIndex >= $questions->count()) {
            return redirect()->back()->with('error', 'Invalid question index.');
        }

        // Save answer in session
        $currentQuestion = $questions[$currentIndex];
        $answers = session()->get('demo_answers', []);
        $answers[$currentQuestion->id] = $selectedAnswer;
        session()->put('demo_answers', $answers);

        // Decide redirection based on direction
        if ($direction === 'submit') {
            return redirect()->route('demotest.result', ['demo_id' => $demo_id]);
        }

        // Compute next index
        if ($direction === 'next') {
            $nextIndex = min($currentIndex + 1, $questions->count() - 1);
        } elseif ($direction === 'prev') {
            $nextIndex = max($currentIndex - 1, 0);
        } else {
            $nextIndex = $currentIndex;
        }

        return redirect()->route('demoquestion.test', [
            'demo_id' => $demo_id,
            'index' => $nextIndex
        ]);
    }


    public function result($demo_id)
    {
        $test = DemoTest::findOrFail($demo_id);
        $questions = DemoQuestion::where('demo_id', $demo_id)->orderBy('question_no')->get();

        $answers = session()->get('demo_answers', []);

         Log::info('Demo Test Session Answers', [
        'demo_id' => $demo_id,
        'answers' => $answers
    ]);

        return view('ClientView.demoresult', compact('test', 'questions', 'answers'));
    }
}
