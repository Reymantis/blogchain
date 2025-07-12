<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\View\View;

class QuizShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Quiz $quiz): View
    {
        $quiz->load('questions', 'questions.options');
        return view('pages.quiz.show', compact('quiz'));
    }
}
