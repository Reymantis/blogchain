@props(['menu'])

<div {{ $attributes->merge(['class' => 'lg:flex space-x-0.5 px-3 hidden text-sm']) }}>
    @foreach($menu as $item)
        @if(!$item->children)
            <a @class([
                'px-4 py-2 hover:bg-gray-500/15 rounded-md',
                'bg-gray-500/15 text-white' => request()->routeIs($item->route),
        ])
               wire:navigate href="{{ route($item->route) }}">
                {{ $item->name }}
            </a>
        @else
            <x-filament::dropdown placement="bottom-start" max-height="400px">
                <x-slot name="trigger">
                    <button @class(["px-4 py-2 inline-flex items-center space-x-1  hover:bg-gray-500/15 rounded-md",
                        'bg-gray-500/15 text-white' => request()->routeIs($item->route),
                        ])>
                        <span>{{ $item->name }}</span>
                        <x-heroicon-s-chevron-up-down class="size-4"/>
                    </button>
                </x-slot>
                <x-filament::dropdown.list>
                    @foreach($item->children as $child)
                        <x-filament::dropdown.list.item
                            href="{{ route($child['route'], $child['slug']) }}"
                            tag="a" wire:navigate="true"
                            @class([
                            "flex items-center !justify-between",
                            ])
                        >
                            <span>{{ $child['name'] }}</span>
                            <small class="float-right text-xs text-black/25 dark:text-white/25">({{ $child['children_count'] }})</small>
                        </x-filament::dropdown.list.item>
                    @endforeach
                </x-filament::dropdown.list>
            </x-filament::dropdown>
        @endif
    @endforeach
</div>
