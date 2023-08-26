<?php

namespace App\Http\Controllers;

use Harishdurga\LaravelQuiz\Models\Quiz;

class DevTestController extends Controller
{
    public function index()
    {

        dd(request()->all());
//        $quiz = Quiz::where('slug', 'charles-sanchez')->first();
//        dd($quiz);
    }

    public function testView()
    {
        return view('dev-test');
    }
}
