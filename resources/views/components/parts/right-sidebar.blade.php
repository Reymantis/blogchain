<aside id="right-sidebar"
       {{ $attributes->merge(['class' => 'w-[300px] fixed shrink-0 z-40 lg:z-20 min-h-screen flex xl:relative transition-transform duration-300  ease-in-out inset-y-0
       -right-[310px]
        xl:right-0']) }}
       :class="{'-translate-x-full shadow-2xl shadow-black': !rightSidebarOpen}"
       @click.away="rightSidebarOpen = true"

>
    <!-- Toggle button - visible only on medium screens -->
    <button
        type="button"
        class="bg-white dark:bg-gray-900 border xl:hidden border-gray-200 dark:border-gray-800 grid place-content-center rounded-l-lg size-10
                absolute top-20 -left-[39px] border-r-0"
        @click="rightSidebarOpen = !rightSidebarOpen"
    >
            <span class="transition" :class="{'rotate-180': !rightSidebarOpen}">
                <x-heroicon-o-chevron-left class="size-6"/>
            </span>
    </button>
    <x-parts.card class="w-full">
        <div class="overflow-auto h-full pr-3 no-scrollbar-track relative">
            @if(trim($slot))
                {{ $slot }}
            @else
                <x-sidebar.categories/>
            @endif
        </div>
    </x-parts.card>
</aside>
