<aside id="right-sidebar"
       {{ $attributes->merge(['class' => 'w-[300px] absolute shrink-0 flex xl:relative transition-transform duration-300 ease-in-out inset-y-0 -right-[310px]
        xl:right-0']) }}
       :class="{'-translate-x-full shadow-2xl shadow-black': !rightSidebarOpen}"
       @click.away="rightSidebarOpen = true"

>
    <!-- Toggle button - visible only on medium screens -->
    <button
        type="button"
        class="bg-white dark:bg-gray-900 border xl:hidden border-gray-200 dark:border-gray-800 grid place-content-center rounded-l-lg size-10
                absolute top-3 -left-[39px] border-r-0"
        @click="rightSidebarOpen = !rightSidebarOpen"
    >
            <span class="transition" :class="{'rotate-180': !rightSidebarOpen}">
                <x-heroicon-o-chevron-left class="size-6"/>
            </span>
    </button>
    <x-parts.card class="w-full">
        {{ $slot }}
    </x-parts.card>
</aside>
