@props([
    'noPadding' => null,
    'as' => 'div'
])
@php
    $classes = ' bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg shadow-sm shadow-black/10 ';
    $classes .= $noPadding ? '' : ' p-6';
@endphp

<{{ $as }} {{ $attributes->merge(['class' => $classes]) }}>
{{ $slot }}
</{{ $as }}>
