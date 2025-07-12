<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\View\View;

class QuizIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Quiz $quizzes): View
    {
        return view('pages.quiz.index', [
            'quizzes' => $quizzes->paginate()
        ]);
    }
}
