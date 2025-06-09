@php use function Filament\Support\prepare_inherited_attributes; @endphp
@props([
    'user' => filament()->auth()->user(),
])

<x-filament::avatar
    :src="filament()->getUserAvatarUrl($user)"
    :alt="__('filament-panels::layout.avatar.alt', ['name' => filament()->getUserName($user)])"
    :circular="false"
    :attributes="
        prepare_inherited_attributes($attributes)
            ->class(['fi-user-avatar'])
    "
/>
