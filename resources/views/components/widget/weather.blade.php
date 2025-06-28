<x-parts.card>
    <div class="weather-widget text-center space-y-2" x-data="weatherWidget()">

        <div class="text-sm font-bold inline-block text-gray-900 dark:text-white/75 px-4 py-0.5 rounded-full border border-gray-900 dark:border-white/5
        tracking-wider">Weather
        </div>

        <div class="text-5xl font-bold text-gray-900 dark:text-white/75 font-mono tracking-tight">Raining</div>

        <template x-if="loading">
            <p class="loading">Getting your location...</p>
        </template>

        <template x-if="error && !weather">
            <p style="color: red;" x-text="error"></p>
            <button class="retry-btn" @click="getLocation()">Try Again</button>
        </template>

        <template x-if="weather && locationName">
            <div>
                <p><strong>Location:</strong> <span x-text="locationName"></span></p>
                <p>
                    <span class="weather-icon" x-html="weatherIcon"></span>
                    <span x-text="weatherCondition"></span>
                </p>
                <p><strong>Temperature:</strong> <span x-text="weather.temperature + '°C'"></span></p>
                <p><strong>Wind Speed:</strong> <span x-text="weather.windspeed + ' km/h'"></span></p>

            </div>
        </template>
    </div>

</x-parts.card>
