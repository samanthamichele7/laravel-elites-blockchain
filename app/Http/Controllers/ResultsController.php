<?php

namespace App\Http\Controllers;

use App\Question;

class ResultsController extends Controller
{
    public function index()
    {
        $questions = Question::with('answers', 'answers.users')
            ->get()
            ->map(function ($question) {
                $question->userAnswerCount = $question->totalUserAnswers();

                return $question;
            });

        return view('results', ['questions' => $questions]);
    }
}
