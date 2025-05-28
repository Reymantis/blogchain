<x-parts.card class="py-3">
    <div class="flex justify-between items-center">
        <div class="h-6 relative w-[275px]">
            <a wire:navigate class="flex text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white" href="{{ route('home') }}">
                {{ config('app.name') }}
            </a>
            <div class="absolute bg-gradient-to-t from-transparent via-gray-200 dark:via-gray-800 to-transparent w-px  right-0 -inset-y-2"></div>
        </div>
        <x-parts.theme-switch/>
    </div>

</x-parts.card>
