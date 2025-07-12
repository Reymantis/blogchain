<x-app-layout title="Quizzes">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 ">
        <x-parts.card class="flex justify-between col-span-full">
            <x-text.heading as="h1" icon="heroicon-o-academic-cap" class="!mb-0">
                Quizzes
            </x-text.heading>
            <x-button.back/>
        </x-parts.card>
        @foreach($quizzes as $quiz)
            <x-parts.card class="space-y-3">
                <x-heroicon-o-academic-cap class="w-12 h-12 inline-flex mx-auto mb-2"/>
                <div class="flex flex-col">
                    <p class="text-xl font-semibold">{{ $quiz->title }}</p>
                    <p class="text-sm opacity-75">{{ $quiz->description }}</p>
                </div>
                <a class="px-4 hidden md:inline-block py-2 text-sm bg-primary-500  hover:bg-primary-600 hover:text-white rounded-md"
                   href="{{ route('quiz.show', $quiz) }}">Take
                    Quiz</a>
            </x-parts.card>
        @endforeach
    </div>
</x-app-layout>
