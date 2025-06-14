@props([
    'noPadding' => null,
    'as' => 'div'
])
@php
    $classes = ' bg-white/85 dark:bg-gray-900/85 backdrop-blur-sm border border-gray-200 dark:border-gray-800 rounded-lg shadow-sm shadow-black/10 ';
    $classes .= $noPadding ? '' : ' p-3';
@endphp

<{{ $as }} {{ $attributes->merge(['class' => $classes]) }}>
{{ $slot }}
</{{ $as }}>
