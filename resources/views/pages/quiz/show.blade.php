<x-app-layout :title="$quiz->title">
    <x-parts.card>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 ">
            <div class="col-span-full">
                {{--                @auth--}}
                {{--                    @php--}}
                {{--                        $user = auth()->user();--}}
                {{--                        $hasAttempted = $user->quizAttempts()->where('quiz_id', $quiz->id)->exists();--}}
                {{--                    @endphp--}}

                {{--                @if($hasAttempted)--}}
                {{--                    <div class="shadow-lg rounded-lg p-6">--}}
                {{--                        <h2 class="text-2xl font-bold mb-4">You have already taken this quiz.</h2>--}}
                {{--                        <p>You can see your results <a--}}
                {{--                                href="{{ route('quiz.results', ['attempt' => $user->quizAttempts()->where('quiz_id', $quiz->id)->first()]) }}"--}}
                {{--                                class="text-primary-500 hover:underline">here</a>.</p>--}}
                {{--                    </div>--}}
                {{--                @else--}}
                <livewire:quiz.quiz-component :quiz="$quiz"/>
                {{--                @endif--}}
                {{--                @else--}}
                {{--                    <div class="shadow-lg rounded-lg p-6">--}}
                {{--                        <h2 class="text-2xl font-bold mb-4">You must be logged in to take this quiz.</h2>--}}
                {{--                        <p>Please <a href="{{ route('login') }}" class="text-primary-500 hover:underline">log in</a> or <a href="{{ route('register') }}"--}}
                {{--                                                                                                                           class="text-primary-500--}}
                {{--                                                                                                                   hover:underline">register</a>--}}
                {{--                            to continue.</p>--}}
                {{--                    </div>--}}
                {{--                @endauth--}}
            </div>
        </div>
    </x-parts.card>
</x-app-layout>
