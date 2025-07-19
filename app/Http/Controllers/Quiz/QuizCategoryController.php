<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\QuizCategory;
use Illuminate\View\View;

class QuizCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(QuizCategory $quizCategory): View
    {
        return view('pages.quiz.categories', [
            'quizCategory' => $quizCategory->get(),
        ]);
    }
}
