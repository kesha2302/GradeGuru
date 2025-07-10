<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class TestviewController extends Controller
{
   public function testview($cp_id)
{
    $userId = Auth::id();

    $regularTests = Test::with('regularQuestions')
        ->where('cp_id', $cp_id)
        ->where('que_type', 'Regular')
        ->get()
        ->map(function ($test) use ($userId) {
            $test->user_results = Result::where('user_id', $userId)
                ->where('test_id', $test->test_id)
                ->orderBy('created_at', 'desc')
                ->get();
            return $test;
        });

    $superTests = Test::with('superQuestions')
        ->where('cp_id', $cp_id)
        ->where('que_type', 'Super')
        ->get()
        ->map(function ($test) use ($userId) {
            $test->user_results = Result::where('user_id', $userId)
                ->where('test_id', $test->test_id)
                ->orderBy('created_at', 'desc')
                ->get();
            return $test;
        });

    return view('ClientView.testview', compact('cp_id', 'regularTests', 'superTests'));
}

}
