<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizCreationRequest;

class ManageQuizController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('quiz.create-form');
    }

    public function store(QuizCreationRequest $request)
    {


    }
}
