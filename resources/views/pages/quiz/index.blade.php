<x-app-layout title="Quizzes">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 ">
        <x-parts.card class="flex justify-between col-span-full">
            <x-text.heading as="h1" icon="heroicon-o-academic-cap" class="!mb-0">
                Quizzes
            </x-text.heading>
            <x-button.back/>
        </x-parts.card>
        @foreach($category->quizzes as $quiz)
            <x-parts.card class="space-y-3">
                <x-heroicon-o-academic-cap class="w-12 h-12 inline-flex mx-auto mb-2"/>
                <div class="flex flex-col">
                    <p class="text-xl font-semibold">{{ $quiz->title }}</p>
                    <p class="text-sm opacity-75">{{ $quiz->description }}</p>
                </div>
                <x-button.anchor wire:navigate href="{{ route('quiz.show', $quiz) }}">Take Quiz</x-button.anchor>
            </x-parts.card>
        @endforeach
    </div>
</x-app-layout>
