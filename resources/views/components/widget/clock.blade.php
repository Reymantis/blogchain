<div {{ $attributes->merge(['class' => 'grid  overflow-clip isolate']) }}>

    <div class="space-y-1 relative z-10" x-data="clockWidget()">
        <!-- Time Display -->
        <div class="space-y-2">
            <div class="text-2xl font-bold text-gray-900 dark:text-white/75 tracking-tight" x-text="formatTime()"></div>
            <div class=" text-gray-600" x-text="formatDate()"></div>
        </div>

        <!-- Timezone -->
        <div class="flex items-center space-x-2 text-gray-700">
            <x-heroicon-o-clock class="size-4 "/>
            <span class="text-sm font-light" x-text="timezone"></span>
        </div>

        <!-- Location -->

        <template x-if="location">
            <div class="flex items-center space-x-2 text-gray-700">
                <x-heroicon-o-map-pin class="size-4"/>
                <span class="text-sm font-light" x-text="location"></span>
            </div>
        </template>
    </div>

</div>
