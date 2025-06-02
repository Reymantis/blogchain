@php use App\Helpers\Menu; @endphp
<x-parts.card class="py-3" x-data="{menuOpen: false}">
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <div class="h-6 relative lg:w-[275px]">
                <a wire:navigate class="flex text-xl font-bold leading-5 align-bottom tracking-tight text-gray-950 dark:text-white" href="{{ route('home') }}">
                    {{ config('app.name') }}
                </a>
            </div>
            <x-navigation.main-menu :$menu/>
        </div>

        <div class="flex space-x-3 items-center">
            @if (filament()->auth()->check())

                <x-filament-panels::user-menu/>
            @else
                <a wire:navigate class="px-2 py-1 text-sm hover:bg-primary-500 rounded-md"
                   href="{{ route('filament.admin.auth.login') }}">
                    Sign In
                </a>
                <a wire:navigate class="px-2 py-1 text-sm hover:bg-primary-500 rounded-md"
                   href="{{ route('filament.admin.auth.register')
                }}">
                    Register
                </a>
                <x-parts.theme-switch/>
            @endif
            <button @click="menuOpen = !menuOpen" class="lg:hidden">
                <x-heroicon-s-bars-3 class="size-5"/>
            </button>
        </div>


    </div>
    <x-navigation.mobile-menu x-collapse x-cloak :$menu x-show="menuOpen" x-on:click.outside="menuOpen = false"/>

</x-parts.card>
