<?php

namespace App\Livewire\Quiz;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class QuizAuthComponent extends Component
{
    public Quiz $quiz;

    public Collection $questions;

    public int $currentQuestionIndex = 0;

    public array $userAnswers = [];

    public bool $showResults = false;

    public int $score = 0;

    public function mount(Quiz $quiz): void
    {
        $this->quiz = $quiz;
        $this->questions = $quiz->questions()->with('options')->get();
    }

    public function selectAnswer($questionId, $optionId): void
    {
        $this->userAnswers[$questionId] = $optionId;
    }

    public function nextQuestion(): void
    {
        if ($this->currentQuestionIndex < count($this->questions) - 1) {
            $this->currentQuestionIndex++;
        }
    }

    public function previousQuestion(): void
    {
        if ($this->currentQuestionIndex > 0) {
            $this->currentQuestionIndex--;
        }
    }

    public function reviewAnswers(): void
    {
        $this->currentQuestionIndex = count($this->questions);
    }

    public function submitQuiz(): void
    {
        $this->score = 0;
        foreach ($this->questions as $question) {
            if (isset($this->userAnswers[$question->id]) && $question->options->find($this->userAnswers[$question->id])->is_correct) {
                $this->score++;
            }
        }

        QuizAttempt::create([
            'user_id' => Auth::id(),
            'quiz_id' => $this->quiz->id,
            'score' => $this->score,
            'answers' => $this->userAnswers,
        ]);

        $this->showResults = true;
    }

    public function render(): View
    {
        return view('livewire.quiz.quiz-auth-component');
    }
}
