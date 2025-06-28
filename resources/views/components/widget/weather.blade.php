<x-parts.card>
    <div class="weather-widget" x-data="weatherWidget()">
        <p class="text-2xl font-semibold">Weather Now</p>

        <template x-if="loading">
            <p class="loading">Getting your location...</p>
        </template>

        <template x-if="error && !weather">
            <p style="color: red;" x-text="error"></p>
            <button class="retry-btn" @click="getLocation()">Try Again</button>
        </template>

        <template x-if="weather && locationName">
            <div class="space-y-2">
                <p><strong>Location:</strong> <span x-text="locationName"></span></p>
                <p><strong>Temperature:</strong> <span x-text="weather.temperature + '°C'"></span></p>
                <p><strong>Wind Speed:</strong> <span x-text="weather.windspeed + ' km/h'"></span></p>
                <p><strong>Time:</strong> <span x-text="formatTime(weather.time)"></span></p>
            </div>
        </template>
    </div>
</x-parts.card>
