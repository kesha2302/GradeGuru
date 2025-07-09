<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Regularquestion;
use App\Models\Superquestion;
use Illuminate\Support\Facades\Log;

class QuestionTestController extends Controller
{

    // public function questiontest($test_id, Request $request)
    // {
    //     $test = Test::findOrFail($test_id);
    //     $regularQuestions = Regularquestion::where('test_id', $test_id)->get()->values();
    //     $superQuestions   = Superquestion::where('test_id', $test_id)->get()->values();

    //     $currentIndex = $request->session()->get('current_question_index', 0);
    //     $type = $request->session()->get('question_type', 'regular');

    //     if ($type === 'regular' && $currentIndex >= $regularQuestions->count()) {
    //         $request->session()->forget(['current_question_index', 'question_type']);
    //         // return view('ClientView.result', compact('test'));
    //         return redirect()->route('test.result', $test_id);
    //     }

    //     if ($type === 'super' && $currentIndex >= $superQuestions->count()) {
    //         $request->session()->forget(['current_question_index', 'question_type']);
    //         // return view('ClientView.result', compact('test'));
    //         return redirect()->route('test.result', $test_id);
    //     }

    //     $question = $type === 'regular' ? $regularQuestions[$currentIndex] : $superQuestions[$currentIndex];
    //     $totalQuestions = $type === 'regular' ? $regularQuestions->count() : $superQuestions->count();

    //     $answers = $request->session()->get('answers', []);
    //     $questionId = $type === 'regular' ? $question->rq_id : $question->sq_id;
    //     $key = $type === 'regular' ? 'rq_' . $questionId : 'sq_' . $questionId;
    //     $selected = $answers[$key] ?? null;



    //     return view('ClientView.questiontest', compact(
    //         'test',
    //         'question',
    //         'currentIndex',
    //         'type',
    //         'totalQuestions',
    //         'selected'
    //     ));
    // }
  public function questiontest($test_id, Request $request)
{
    $test = Test::findOrFail($test_id);
    $regularQuestions = Regularquestion::where('test_id', $test_id)->get()->values();
    $superQuestions = Superquestion::where('test_id', $test_id)->get()->values();

    // First-time start: check for query param 'type'
    if (!$request->session()->has('question_type')) {
        $type = $request->query('type', 'regular'); // default to 'regular'
        $request->session()->put('question_type', $type);
        $request->session()->put('current_question_index', 0);
        $request->session()->forget('answers');
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

        // Log::info('Initial current_question_index: ' . $currentIndex);
        // Log::info('Initial answers: ', $request->session()->get('answers', []));

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
                // Log::info("Saving answer for Regular Question ID $rq_id: $answer");
            } elseif ($sq_id) {
                $key = 'sq_' . $sq_id;
                // Log::info("Saving answer for Super Question ID $sq_id: $answer");
            } else {
                // Log::warning('No question ID found in request');
                return redirect()->back()->withErrors(['Invalid question ID']);
            }

            $answers[$key] = $answer;
            $request->session()->put('answers', $answers);

            $currentIndex++;
        } elseif ($direction === 'prev') {
            $currentIndex = max(0, $currentIndex - 1);
        }

        // Log::info('Updated current_question_index: ' . $currentIndex);
        // Log::info('Updated answers: ', $request->session()->get('answers', []));

        $request->session()->put('current_question_index', $currentIndex);

        $type = $request->session()->get('question_type', 'regular');
return redirect()->route('question.test', ['test_id' => $test_id, 'type' => $type]);

        // return redirect()->route('question.test', $test_id);
    }


    // public function result($test_id, Request $request)
    // {
    //     $test = Test::findOrFail($test_id);
    //     $answers = $request->session()->get('answers', []);

    //     $regularIds = [];
    //     $superIds = [];

    //     foreach (array_keys($answers) as $key) {
    //         if (str_starts_with($key, 'rq_')) {
    //             $regularIds[] = (int) str_replace('rq_', '', $key);
    //         } elseif (str_starts_with($key, 'sq_')) {
    //             $superIds[] = (int) str_replace('sq_', '', $key);
    //         }
    //     }

    //     // Fetch questions by their IDs
    //     $regularQuestions = Regularquestion::whereIn('rq_id', $regularIds)->get()->keyBy('rq_id');
    //     $superQuestions = Superquestion::whereIn('sq_id', $superIds)->get()->keyBy('sq_id');

    //     // $allQuestions = $regularQuestions->merge($superQuestions);
    //     $allQuestions = collect();

    //     foreach ($regularQuestions as $rq) {
    //         $allQuestions->put('rq_' . $rq->rq_id, $rq);
    //     }
    //     foreach ($superQuestions as $sq) {
    //         $allQuestions->put('sq_' . $sq->sq_id, $sq);
    //     }


    //     return view('ClientView.result', compact('test', 'answers', 'allQuestions'));
    // }

    public function result($test_id, Request $request)
{
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

    // Fetch questions by their IDs
    $regularQuestions = Regularquestion::whereIn('rq_id', $regularIds)->get()->keyBy('rq_id');
    $superQuestions = Superquestion::whereIn('sq_id', $superIds)->get()->keyBy('sq_id');

    $allQuestions = collect();

    foreach ($regularQuestions as $rq) {
        $allQuestions->put('rq_' . $rq->rq_id, $rq);
    }
    foreach ($superQuestions as $sq) {
        $allQuestions->put('sq_' . $sq->sq_id, $sq);
    }

    // ✅ Now calculate correct/wrong counts
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

    return view('ClientView.result', compact('test', 'answers', 'allQuestions', 'correctCount', 'wrongCount'));
}

}
