<?php

namespace App\Http\Controllers;

use App\Models\DemoQuestion;
use App\Models\DemoResult;
use App\Models\DemoTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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

        $startKey = "test_start_time_$demo_id";
        $durationKey = "test_duration_$demo_id";

        if (!session()->has($startKey)) {
            session()->put($startKey, time());
        }

        if (!session()->has($durationKey)) {
            session()->put($durationKey, $test->time * 60);
        }

        $start = session($startKey);
        $duration = session($durationKey);
        $elapsed = time() - $start;

        // Log::info('Timer Check', [
        //     'start_time' => $start,
        //     'duration' => $duration,
        //     'elapsed' => $elapsed,
        //     'time_now' => time(),
        // ]);

        if ($elapsed >= $duration) {
            return redirect()->route('demotest.result', ['demo_id' => $demo_id]);
        }

        $question = $questions[$currentIndex];
        $totalQuestions = $questions->count();
        $answers = session()->get('demo_answers', []);
        $selected = $answers[$question->demoque_id] ?? null;

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
        $questionId = $request->input('question_id');
        $selectedAnswer = $request->input('answer', '-');
        $currentIndex = (int) $request->input('index', 0);
        $direction = $request->input('direction', 'next');

        $questions = DemoQuestion::where('demo_id', $demo_id)->orderBy('question_no')->get()->values();

        if ($currentIndex < 0 || $currentIndex >= $questions->count()) {
            return redirect()->back()->with('error', 'Invalid question index.');
        }

        $answers = session()->get('demo_answers', []);
        $answers[$questionId] = $selectedAnswer;
        session()->put('demo_answers', $answers);

        if ($direction === 'submit') {
            return redirect()->route('demotest.result', ['demo_id' => $demo_id]);
        }

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
        $user = Auth::user();

        $test = DemoTest::findOrFail($demo_id);
        $questions = DemoQuestion::where('demo_id', $demo_id)->orderBy('question_no')->get();
        $answers = session()->get('demo_answers', []);

        $totalQuestions = $questions->count();
        $correct = 0;

        foreach ($questions as $question) {
            $userAnswerKey = $answers[$question->demoque_id] ?? null;

            if ($userAnswerKey && isset($question->{$userAnswerKey})) {
                $userAnswerText = $question->{$userAnswerKey};
                if ($userAnswerText === $question->answer) {
                    $correct++;
                }
            }
        }

        $wrong = $totalQuestions - $correct;
        $passMarks = $test->pass_marks;
        $status = $correct >= $passMarks ? 'Pass' : 'Fail';

        DemoResult::create([
            'user_id'         => $user->id,
            'demo_id'         => $test->demo_id,
            'result'          => $status,
            'correct' => $correct,
        ]);

        // session()->forget(['demo_answers']);
        session()->forget(['demo_answers', "test_start_time_$demo_id", "test_duration_$demo_id"]);


        return view('ClientView.demoresult', compact(
            'test',
            'questions',
            'answers',
            'totalQuestions',
            'correct',
            'wrong',
            'status',
            'passMarks'
        ));
    }

    public function autoSubmit($demo_id, Request $request)
    {
        $test = DemoTest::findOrFail($demo_id);
        $answers = $request->session()->get('demo_answers', []);
        $currentIndex = $request->session()->get('current_question_index', 0);


        $request->session()->put('demo_answers', $answers);
        $request->session()->forget(['question_type', 'current_question_index']);

        return response()->json(['status' => 'submitted']);
    }
}
