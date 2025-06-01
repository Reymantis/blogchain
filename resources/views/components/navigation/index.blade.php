@php use App\Helpers\Menu; @endphp
<x-parts.card class="py-3">
    <div class="flex justify-between items-center">
        <div class="flex">

            <div class="h-6 relative w-[275px]">
                <a wire:navigate class="flex text-xl font-bold leading-5 align-bottom tracking-tight text-gray-950 dark:text-white" href="{{ route('home') }}">
                    {{ config('app.name') }}
                </a>
                <div class="absolute bg-gradient-to-t from-transparent via-gray-200 dark:via-gray-800 to-transparent w-px  right-0 -inset-y-2"></div>
            </div>
            <div class="flex space-x-2 px-3">
                @foreach(Menu::main() as $item)
                    @if(!$item->children)
                        <a class="px-2 py-1 hover:bg-gray-500/15 rounded-lg" wire:navigate href="{{ route($item->route) }}">
                            {{ $item->name }}
                        </a>
                    @else
                        <x-filament::dropdown placement="bottom-start" max-height="400px">
                            <x-slot name="trigger">
                                <button class="px-2 py-1 inline-flex items-center space-x-1  hover:bg-gray-500/15 rounded-lg">
                                    <span>{{ $item->name }}</span>

                                    <x-heroicon-s-chevron-up-down class="size-4"/>
                                </button>
                            </x-slot>

                            <x-filament::dropdown.list>
                                @foreach($item->children as $child)
                                    <x-filament::dropdown.list.item
                                        href="https://filamentphp.com"
                                        tag="a">
                                        {{ $child['name'] }}
                                    </x-filament::dropdown.list.item>
                                @endforeach
                            </x-filament::dropdown.list>
                        </x-filament::dropdown>
                    @endif
                @endforeach
            </div>
        </div>

        {{--        <x-codicon-account class="size-6    " />--}}

        @if (filament()->auth()->check())
            <x-filament-panels::user-menu/>
        @else
            <x-parts.theme-switch/>
        @endif


    </div>

</x-parts.card>
