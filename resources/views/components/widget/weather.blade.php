<x-parts.card>
    <div class="weather-widget" x-data="weatherWidget()">
        <h2>🌤️ Weather Now</h2>

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
                    <strong>Weather:</strong> <span x-text="weather.weathersymbol_caption"></span>
                </p>
                <p><strong>Temperature:</strong> <span x-text="weather.temperature + '°C'"></span></p>
                <p><strong>Wind Speed:</strong> <span x-text="weather.windspeed + ' km/h'"></span></p>
                <p><strong>Time:</strong> <span x-text="formatTime(weather.time)"></span></p>
            </div>
        </template>
    </div>

</x-parts.card>
