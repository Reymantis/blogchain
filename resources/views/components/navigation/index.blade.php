@php use App\Helpers\Menu; @endphp
<div class="fixed inset-x-0 top-0 z-30 px-2 pt-2 backdrop-blur-sm bg-gradient-to-b from-white/75 dark:from-gray-950/75 to-transparent">

    <x-parts.card class="py-3" x-data="{menuOpen: false}">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <div class="h-6 relative lg:w-[275px]">
                    <a wire:navigate class="flex text-xl font-bold leading-5 align-bottom tracking-tight text-gray-950 dark:text-white"
                       href="{{ route('home') }}">
                        {{ config('app.name') }}
                    </a>
                </div>
                <x-navigation.main-menu :$menu/>
            </div>

            <div class="flex space-x-3 items-center">
                <x-parts.tooltip position="bottom" text="Write a new article" arrow>
                    <a wire:navigate class="px-4 py-2 flex items-center text-sm font-semibold text-shadow-sm text-shadow-black/10  text-white bg-primary-500
                hover:bg-primary-400
                rounded-md"
                       href="{{ route('filament.admin.resources.posts.create') }}">
                        <x-heroicon-o-plus class="inline size-5 "/>
                        <span class="hidden lg:inline-block">Write Article</span>
                    </a>
                </x-parts.tooltip>
                @if (filament()->auth()->check())
                    <x-filament-panels::user-menu/>
                @else
                    <a wire:navigate class="px-4 py-2 text-sm hover:bg-primary-500 hover:text-white rounded-md"
                       href="{{ route('filament.admin.auth.login') }}">
                        Sign In
                    </a>
                    <a wire:navigate class="px-4 py-2 text-sm hover:bg-primary-500 hover:text-white rounded-md"
                       href="{{ route('filament.admin.auth.register')
                }}">
                        Register
                    </a>
                @endif
                <x-parts.theme-switch/>
                <button @click="menuOpen = !menuOpen" class="lg:hidden">
                    <x-heroicon-s-bars-3 class="size-5"/>
                </button>
            </div>


        </div>
        <x-navigation.mobile-menu x-collapse x-cloak :$menu x-show="menuOpen" x-on:click.outside="menuOpen = false"/>

    </x-parts.card>
</div>
