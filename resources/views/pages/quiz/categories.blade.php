<x-app-layout title="Quiz Categories">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 ">
        @if($quizCategory)
            @foreach($quizCategory as $category)
                <x-parts.card class="space-y-3">
                    <p>{{ $category->name }}</p>
                    <p>{{ $category?->description }}</p>
                    <x-button.anchor href="{{ route('quiz.index', $category) }}">Start Learning</x-button.anchor>
                </x-parts.card>
            @endforeach
        @endif
    </div>
    <x-slot name="rightSidebar">
        <div class="space-y-5">
            <x-widget.weather/>
            <x-sidebar.tags/>
        </div>
    </x-slot>
</x-app-layout>
