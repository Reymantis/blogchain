@props(['user', 'size' => 'md'])

@php
    $sizes = [
        'xs' => 'size-4',
        'sm' => 'size-6',
        'md' => 'size-8',
        'lg' => 'size-12',
        'xl' => 'size-16',
        '2xl' => 'size-20',
    ];

        $classes = ' rounded-full bg-primary-500 ';
        $classes .= $sizes[$size]
@endphp


<div {{ $attributes->merge(['class' => $classes]) }}>
    <img src="{{ $user->avatarUrl }}" alt="{{ $user->name }}" class="w-full h-full object-cover rounded-full">
</div>
