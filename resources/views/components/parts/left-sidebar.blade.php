<aside id="left-sidebar"
       {{ $attributes->merge(['class' => 'w-[300px]  fixed z-40 lg:z-20  shrink-0 flex lg:relative transition-transform duration-300 ease-in-out
       inset-y-0 -left-[310px]
        lg:left-0']) }}
       :class="{'translate-x-full shadow-2xl shadow-black': !leftSidebarOpen}"
       @click.away="leftSidebarOpen = true"

>
    <!-- Toggle button - visible only on medium screens -->

    <x-parts.card class="w-full relative">
        <button
            type="button"
            class="bg-white  dark:bg-gray-900 border lg:hidden border-gray-200 dark:border-gray-800 grid place-content-center rounded-r-lg size-10
                absolute top-20 -right-[39px] border-l-0"
            @click="leftSidebarOpen = !leftSidebarOpen"
        >
            <span class="transition" :class="{'rotate-180': !leftSidebarOpen}">
                <x-heroicon-o-chevron-right class="size-6"/>
            </span>
        </button>
        <div class="overflow-auto h-full pr-3 no-scrollbar-track relative">
            @if(trim($slot))
                {{ $slot }}
            @else
                <x-sidebar.categories/>
            @endif
        </div>


    </x-parts.card>
</aside>
