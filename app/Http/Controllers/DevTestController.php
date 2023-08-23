<?php

namespace App\Http\Controllers;

use Harishdurga\LaravelQuiz\Models\Quiz;

class DevTestController extends Controller
{
    public function index()
    {
        $quiz = Quiz::where('slug', 'charles-sanchez')->first();
        dd($quiz);

    }
}
