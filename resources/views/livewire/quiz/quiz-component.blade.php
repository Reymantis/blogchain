<div x-data="{
    currentQuestionIndex: @entangle('currentQuestionIndex'),
    userAnswers: @entangle('userAnswers'),
    showResults: @entangle('showResults'),
    score: @entangle('score'),
    questions: @js($questions),
    reviewing: false,
    get isLastQuestion() {
        return this.currentQuestionIndex === this.questions.length - 1;
    },
    get isReviewing() {
        return this.currentQuestionIndex === this.questions.length;
    }
}">
    <div class="relative">
        @if(!$showResults)
            <div class="shadow-lg rounded-lg p-6">
                <div class="relative h-96">
                    @foreach($questions as $index => $question)
                        <div x-show="currentQuestionIndex === {{ $index }}"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="opacity-0 transform -translate-x-full"
                             x-transition:enter-end="opacity-100 transform translate-x-0"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 transform translate-x-0"
                             x-transition:leave-end="opacity-0 transform translate-x-full"
                             class="absolute inset-0"
                        >
                            <div class="mb-4">
                                <h2 class="text-2xl font-bold">{{ $question->question }}</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($question->options as $option)
                                    <div
                                        wire:click="selectAnswer({{ $question->id }}, {{ $option->id }})"
                                        :class="{ 'bg-primary-500 text-white': userAnswers[{{ $question->id }}] == {{ $option->id }} }"
                                        class="p-4 border rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700"
                                    >
                                        {{ $option->option }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div x-show="isReviewing"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 transform translate-x-full"
                         x-transition:enter-end="opacity-100 transform translate-x-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 transform translate-x-0"
                         x-transition:leave-end="opacity-0 transform -translate-x-full"
                         class="absolute inset-0"
                    >
                        <h2 class="text-2xl font-bold mb-4">Review Your Answers</h2>
                        @foreach($questions as $index => $question)
                            <div class="mb-2">
                                <p class="font-semibold">{{ $question->question }}</p>
                                <p>{{ $question->options->find($userAnswers[$question->id] ?? null)->option ?? 'No answer' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-between mt-6">
                    <button @click="$wire.previousQuestion()" x-show="currentQuestionIndex > 0 && !isReviewing"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                        Previous
                    </button>

                    <div x-show="!isLastQuestion && !isReviewing">
                        <button @click="$wire.nextQuestion()"
                                class="px-4 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600">
                            Next
                        </button>
                    </div>

                    <div x-show="isLastQuestion && !isReviewing">
                        <button @click="$wire.reviewAnswers()"
                                class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                            Review Answers
                        </button>
                    </div>

                    <div x-show="isReviewing">
                        <button @click="$wire.submitQuiz()"
                                class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                            Submit Quiz
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Quiz Results</h2>
                <p class="text-lg">You scored {{ $score }} out of {{ count($questions) }}</p>
            </div>
        @endif
    </div>
</div>
