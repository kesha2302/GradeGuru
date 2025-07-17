<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Regularquestion;
use App\Models\Result;
use App\Models\Superquestion;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class QuestionTestController extends Controller
{

    public function questiontest($test_id, Request $request)
    {
        $test = Test::findOrFail($test_id);
        $regularQuestions = Regularquestion::where('test_id', $test_id)->get()->values();
        $superQuestions = Superquestion::where('test_id', $test_id)->get()->values();

        if (!$request->session()->has('question_type')) {
            $type = $request->query('type', 'regular');
            $request->session()->put('question_type', $type);
            $request->session()->put('current_question_index', 0);
            $request->session()->forget('answers');

            $durationInSeconds = $test->time * 60;
            $request->session()->put('test_duration', $durationInSeconds);

            $request->session()->put('test_start_time', now()->timestamp);
        }


        $type = $request->session()->get('question_type');
        $currentIndex = $request->session()->get('current_question_index', 0);

        if ($type === 'regular') {
            if ($currentIndex >= $regularQuestions->count()) {
                $request->session()->forget(['question_type', 'current_question_index']);
                return redirect()->route('test.result', $test_id);
            }
            $question = $regularQuestions[$currentIndex];
            $totalQuestions = $regularQuestions->count();
            $questionId = $question->rq_id;
            $key = 'rq_' . $questionId;
        } else {
            if ($currentIndex >= $superQuestions->count()) {
                $request->session()->forget(['question_type', 'current_question_index']);
                return redirect()->route('test.result', $test_id);
            }
            $question = $superQuestions[$currentIndex];
            $totalQuestions = $superQuestions->count();
            $questionId = $question->sq_id;
            $key = 'sq_' . $questionId;
        }

        $answers = $request->session()->get('answers', []);
        $selected = $answers[$key] ?? null;

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

        $direction = $request->input('direction', 'next');
        $currentIndex = $request->session()->get('current_question_index', 0);

        if ($direction === 'next') {
            $request->validate([
                'answer' => 'required'
            ]);

            $rq_id = $request->input('rq_id');
            $sq_id = $request->input('sq_id');

            $answer = $request->input('answer');
            $answers = $request->session()->get('answers', []);

            if ($rq_id) {
                $key = 'rq_' . $rq_id;
            } elseif ($sq_id) {
                $key = 'sq_' . $sq_id;
            } else {
                return redirect()->back()->withErrors(['Invalid question ID']);
            }

            $answers[$key] = $answer;
            $request->session()->put('answers', $answers);

            $currentIndex++;
        } elseif ($direction === 'prev') {
            $currentIndex = max(0, $currentIndex - 1);
        }

        $request->session()->put('current_question_index', $currentIndex);

        $type = $request->session()->get('question_type', 'regular');
        return redirect()->route('question.test', ['test_id' => $test_id, 'type' => $type]);
    }



    public function result($test_id, Request $request)
    {
        $user = Auth::user();

        $test = Test::findOrFail($test_id);
        $answers = $request->session()->get('answers', []);

        $regularIds = [];
        $superIds = [];

        foreach (array_keys($answers) as $key) {
            if (str_starts_with($key, 'rq_')) {
                $regularIds[] = (int) str_replace('rq_', '', $key);
            } elseif (str_starts_with($key, 'sq_')) {
                $superIds[] = (int) str_replace('sq_', '', $key);
            }
        }

        $regularQuestions = Regularquestion::whereIn('rq_id', $regularIds)->get()->keyBy('rq_id');
        $superQuestions = Superquestion::whereIn('sq_id', $superIds)->get()->keyBy('sq_id');

        $allQuestions = collect();
        foreach ($regularQuestions as $rq) {
            $allQuestions->put('rq_' . $rq->rq_id, $rq);
        }
        foreach ($superQuestions as $sq) {
            $allQuestions->put('sq_' . $sq->sq_id, $sq);
        }

        $correctCount = 0;
        $wrongCount = 0;

        foreach ($answers as $questionKey => $selectedOption) {
            $question = $allQuestions[$questionKey] ?? null;

            if ($question) {
                $selectedOption = trim($selectedOption);
                $correctOption = trim($question->answer);

                $selectedText = str_starts_with($selectedOption, 'option') ? ($question->{$selectedOption} ?? '') : $selectedOption;
                $correctText  = str_starts_with($correctOption, 'option') ? ($question->{$correctOption} ?? '') : $correctOption;

                if ($selectedText === $correctText) {
                    $correctCount++;
                } else {
                    $wrongCount++;
                }
            }
        }

        $totalQuestions = $correctCount + $wrongCount;
        $passingScore = $test->pass_marks;
        $status = $correctCount >= $passingScore ? 'Pass' : 'Fail';

        Result::create([
            'test_id'         => $test->test_id,
            'cp_id'           => $test->cp_id,
            'user_id'         => $user->id,
            'result'          => $status,
            'correct' => $correctCount,
        ]);

        $request->session()->forget(['answers', 'question_type', 'current_question_index']);

        return view('ClientView.result', compact(
            'test',
            'answers',
            'allQuestions',
            'correctCount',
            'wrongCount',
            'totalQuestions',
            'passingScore',
            'status'
        ));
    }

    public function autoSubmit($test_id, Request $request)
    {
        $test = Test::findOrFail($test_id);
        $type = $request->session()->get('question_type');
        $answers = $request->session()->get('answers', []);
        $currentIndex = $request->session()->get('current_question_index', 0);

        if ($type === 'regular') {
            $questions = Regularquestion::where('test_id', $test_id)->get()->values();
            for ($i = $currentIndex; $i < $questions->count(); $i++) {
                $key = 'rq_' . $questions[$i]->rq_id;
                if (!isset($answers[$key])) {
                    $answers[$key] = '-';
                }
            }
        } elseif ($type === 'super') {
            $questions = Superquestion::where('test_id', $test_id)->get()->values();
            for ($i = $currentIndex; $i < $questions->count(); $i++) {
                $key = 'sq_' . $questions[$i]->sq_id;
                if (!isset($answers[$key])) {
                    $answers[$key] = '-';
                }
            }
        }

        $request->session()->put('answers', $answers);
        $request->session()->forget(['question_type', 'current_question_index']);

        return response()->json(['status' => 'submitted']);
    }
}
