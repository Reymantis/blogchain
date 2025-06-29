@props(['category'])

<x-parts.card {{ $attributes }}>
    <a wire:naveigate.hover href="{{ route('posts.index', $category) }}">{{ $category->name }}</a>
</x-parts.card>
