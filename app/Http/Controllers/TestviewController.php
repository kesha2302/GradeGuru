<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;

class TestviewController extends Controller
{
    public function testview($cp_id)
    {
        $regularTests = Test::with('regularQuestions')
            ->where('cp_id', $cp_id)
            ->where('que_type', 'Regular')
            ->get();

        $superTests = Test::with('superQuestions')
            ->where('cp_id', $cp_id)
            ->where('que_type', 'Super')
            ->get();

        return view('ClientView.testview', compact('cp_id', 'regularTests', 'superTests'));
    }
}
