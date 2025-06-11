<x-app-layout :title="$post->title" :description="$post->description" :keywords="$post->tags">
    <x-parts.card class="flex justify-between mb-3">
        <div></div>
        <x-button.back/>
    </x-parts.card>

    <x-parts.card>
        <div class="prose dark:prose-invert md:prose-xl mx-auto">
            <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="image for {{ $post->title }}" class="w-full h-auto rounded-lg mb-4">
            <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
            <p class="text-sm text-gray-500">Published on {{ $post->created_at->format('F j, Y') }}</p>
            <div class="mt-4">
                {!! $post->content !!}
            </div>
        </div>
    </x-parts.card>
</x-app-layout>
