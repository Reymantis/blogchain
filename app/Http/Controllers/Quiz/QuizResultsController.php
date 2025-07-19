<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\QuizAttempt;

class QuizResultsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(QuizAttempt $attempt)
    {

        return view('pages.quiz.results', compact('attempt'));
    }
}
