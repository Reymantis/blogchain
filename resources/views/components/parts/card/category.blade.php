@props(['category'])

<x-parts.card {{ $attributes }}>
    <a wire:naveigate href="{{ route('posts.index', $category) }}">{{ $category->name }}</a>
</x-parts.card>
