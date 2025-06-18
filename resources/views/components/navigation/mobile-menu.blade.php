@props(['menu'])

<div {{ $attributes->merge(['class' => 'lg:hidden py-3 flex flex-col space-y-2']) }}>

    @foreach($menu as $item)
        @if(!$item->children)
            <a wire:navigate class="px-2 py-1 flex flex-1 hover:bg-gray-500/15 rounded-md" wire:navigate href="{{ route($item->route) }}">
                {{ $item->name }}
            </a>
        @else
            <div x-data="{ open: false }">
                <button @click="open = !open" class="px-2 py-1 flex flex-1 items-center space-x-1 hover:bg-gray-500/15 rounded-md w-full text-left">
                    <span>{{ $item->name }}</span>
                    <x-heroicon-s-chevron-up-down class="size-4"/>
                </button>
                <div x-cloak x-show="open" x-collapse class="pl-4 flex flex-col overflow-hidden">
                    @foreach($item->children as $child)
                        <a
                            href="{{ route($child['route'], $child['slug']) }}"
                            class="px-2 py-1 hover:bg-gray-500/15 rounded-md"
                            wire:navigate
                        >
                            {{ $child['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach

</div>
