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
         $tests = Test::where('cp_id', $cp_id)->get();
        //  $test = Test::where('test_id', $test_id)->get();
         $regularTests = Test::where('cp_id', $cp_id)->where('que_type', 'regular')->get();
        $superTests = Test::where('cp_id', $cp_id)->where('que_type', 'super')->get();


        return view ('ClientView.Layouts.testview',
        compact('tests','cp_id','regularTests','superTests'));
    }
}


