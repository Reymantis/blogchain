<div
    class="fixed md:hidden inset-x-0 bottom-0 z-[80] items-center flex justify-around border border-gray-200 dark:border-gray-800  bg-white dark:bg-gray-950
    min-h-[60px]
    shadow-[0px_-9px_6px_-3px_rgba(0,_0,_0,_0.1)]">
    <a wire:navigate href="{{ route('home') }}" class="size-10 text-gray-900 dark:text-white hover:bg-gray-950/5 hover:dark:bg-white/5 rounded-md ">
        <x-heroicon-o-home class="size-6  mx-auto mt-2"/>
    </a>
    {{--    <a wire:navigate href="{{ route('home') }}" class="size-10 text-gray-900 dark:text-white hover:bg-gray-950/5 hover:dark:bg-white/5 rounded-md ">--}}
    {{--        <x-heroicon-o-newspaper class="size-6  mx-auto mt-2"/>--}}
    {{--    </a>--}}
    <a wire:navigate href="{{ route('filament.admin.resources.posts.create') }}"
       class="size-10 bg-primary-500 text-gray-900 dark:text-white hover:bg-gray-950/5 hover:dark:bg-primary-500/75 rounded-md ">
        <x-heroicon-o-plus class="size-6  mx-auto mt-2"/>
    </a>
    {{--    <a wire:navigate href="#" class="size-10 text-gray-900 dark:text-white hover:bg-gray-950/5 hover:dark:bg-white/5 rounded-md ">--}}
    {{--        <x-heroicon-o-users class="size-6  mx-auto mt-2"/>--}}
    {{--    </a>--}}
    <a wire:navigate href="{{ route('contact-us') }}" class="size-10 text-gray-900 dark:text-white hover:bg-gray-950/5 hover:dark:bg-white/5 rounded-md ">
        <x-heroicon-o-envelope-open
            class="size-6  mx-auto mt-2"/>
    </a>

</div>
