<x-parts.card class="p-6" x-data="weatherWidget()">
    <template x-if="loading">
        <p class="loading text-center">Getting your location...</p>
    </template>


    <template x-if="error && !weather">
        <div class="flex flex-col justify-center items-center space-y-2 text-gray-700">
            <div class="text-lg text-gray-600">Weather not available</div>
            <div class="flex items-center justify-center space-x-2 text-gray-700">
                <x-heroicon-o-map-pin class="size-4 "/>
                <span class="text-sm font-medium" x-text="error"></span>
            </div>
        </div>
    </template>

    <template x-if="true">

        <div class="flex items-center gap-2 mb-4">
            <x-heroicon-s-map-pin class="size-4 "/>
            <span class="text-sm font-medium text-white/90" x-text="locationName"></span>
        </div>

        <div class="flex items-center justify-between mb-6">
            <div class="flex flex-col">
                <div class="flex items-baseline gap-1">
                    <span class="text-4xl font-bold" x-text="weather.temperature  + '°c'"></span>
                </div>
                <span class="text-lg  mt-1" x-text="weatherCondition"></span>
            </div>
            <div class="flex-shrink-0">
                <span class="text-4xl block" x-html="weatherIcon"></span>
            </div>
        </div>
        <div class="flex items-center gap-2 bg-gray-100 dark:bg-white/5 p-2 rounded-md -mx-2">
            <div class="inline-flex items-center space-x-1">
                <x-dynamic-component component="wi-strong-wind" class="size-8 "/>
                <span>Wind Speed</span>
                <strong class="text-sm" x-text="weather.windspeed + ' km/h'"></strong>
            </div>
        </div>
    </template>
</x-parts.card>
