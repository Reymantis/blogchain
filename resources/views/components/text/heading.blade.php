@props([
    'as' => 'h2',
    'icon' => null,
])

<{{$as}} {{ $attributes->merge(['class' => 'text-lg  text-gray-500 flex items-center space-x-2 dark:text-gray-400 font-semibold mb-3']) }}>
@if($icon)
    <x-dynamic-component :component="$icon" class="size-5"/>
@endif
<span>{{$slot}}</span>
</{{$as}}>
