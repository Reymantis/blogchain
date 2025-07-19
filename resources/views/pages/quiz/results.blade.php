<x-app-layout title="Quiz Results">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 ">
        <div class="col-span-full">
            <x-parts.card>
                <h1 class="text-2xl font-bold mb-4">Quiz Results</h1>
                <p class="mb-4">You scored {{ $attempt->score }} out of {{ $attempt->quiz->questions->count() }}</p>
                <h2 class="text-xl font-bold mb-2">Your Answers</h2>
                {{--                @foreach($attempt->quiz->questions as $question)--}}
                {{--                    <div class="mb-4">--}}
                {{--                        <p class="font-semibold">{{ $question->question }}</p>--}}
                {{--                        @php--}}
                {{--                            dump($question->options->find(auth()->user()->id));--}}
                {{--                            dump($attempt->answers);--}}
                {{--                            $userAnswerId = $attempt->answers->where('question_id', $question->id)->first()->option_id ?? null;--}}
                {{--                            $userAnswer = $question->options->find($userAnswerId);--}}
                {{--                            $correctAnswer = $question->options->where('is_correct', true)->first();--}}
                {{--                        @endphp--}}
                {{--                        <p class="--}}
                {{--                                                    @if($userAnswer && $userAnswer->is_correct)--}}
                {{--                                                        text-green-500--}}
                {{--                                                    @else--}}
                {{--                                                        text-red-500--}}
                {{--                                                    @endif--}}
                {{--                                                ">--}}
                {{--                            Your answer: {{ $userAnswer->option ?? 'No answer' }}--}}
                {{--                        </p>--}}
                {{--                        @if($userAnswer && !$userAnswer->is_correct)--}}
                {{--                            <p class="text-green-500">Correct answer: {{ $correctAnswer->option }}</p>--}}
                {{--                        @endif--}}
                {{--                    </div>--}}
                {{--                @endforeach--}}
            </x-parts.card>
        </div>
    </div>
</x-app-layout>
