function weatherWidget() {
    return {
        loading: true,
        error: null,
        weather: null,
        locationName: null,
        weatherIcon: null,
        weatherCondition: null,

        async getLocation() {
            if (!navigator.geolocation) {
                this.error = "Geolocation not supported.";
                this.loading = false;
                return;
            }

            this.loading = true;
            this.error = null;

            try {
                const position = await new Promise((resolve, reject) => {
                    navigator.geolocation.getCurrentPosition(resolve, reject, {
                        enableHighAccuracy: true,
                        timeout: 10000,
                        maximumAge: 0
                    });
                });
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                this.getWeather(lat, lon);
                this.getLocationName(lat, lon);
            } catch (err) {
                this.loading = false;
                if (err.code === 1) {
                    this.error = "Location access denied. Please enable location services.";
                } else {
                    this.error = "Failed to get location.";
                }
            }
        },

        async getWeather(lat, lon) {
            const url = `https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current_weather=true`;

            try {
                const res = await fetch(url);
                const data = await res.json();
                this.weather = data.current_weather;
                this.setWeatherIcon(data.current_weather.weathercode);
                console.log(data);
            } catch (err) {
                this.error = "Failed to load weather.";
            }
        },

        async getLocationName(lat, lon) {
            const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`;

            try {
                const res = await fetch(url);
                const data = await res.json();
                const city = data.address.city || data.address.town || data.address.village;
                const country = data.address.country;
                this.locationName = `${city}, ${country}`;
                this.loading = false;
            } catch (err) {
                this.error = "Failed to load location name.";
                this.loading = false;
            }
        },

        setWeatherIcon(code) {
            switch (code) {
                case 0:
                    this.weatherIcon = '☀️';
                    this.weatherCondition = 'Sunny';
                    break;
                case 1:
                case 2:
                case 3:
                    this.weatherIcon = '⛅️';
                    this.weatherCondition = 'Partly Cloudy';
                    break;
                case 45:
                case 48:
                    this.weatherIcon = '🌫️';
                    this.weatherCondition = 'Foggy';
                    break;
                case 51:
                case 53:
                case 55:
                    this.weatherIcon = '☁️';
                    this.weatherCondition = 'Drizzle';
                    break;
                case 56:
                case 57:
                case 61:
                case 63:
                case 65:
                    this.weatherIcon = '🌧️';
                    this.weatherCondition = 'Rainy';
                    break;
                case 66:
                case 67:
                    this.weatherIcon = '❄️';
                    this.weatherCondition = 'Sleet';
                    break;
                case 71:
                case 73:
                case 75:
                    this.weatherIcon = '❄️';
                    this.weatherCondition = 'Snowy';
                    break;
                case 77:
                    this.weatherIcon = '☃️';
                    this.weatherCondition = 'Snow Grains';
                    break;
                case 80:
                case 81:
                case 82:
                    this.weatherIcon = '🌧️';
                    this.weatherCondition = 'Showers';
                    break;
                case 85:
                case 86:
                    this.weatherIcon = '❄️';
                    this.weatherCondition = 'Snow Showers';
                    break;
                case 95:
                case 96:
                case 99:
                    this.weatherIcon = '⛈️';
                    this.weatherCondition = 'Thunderstorm';
                    break;
                default:
                    this.weatherIcon = '';
                    this.weatherCondition = 'Unknown';
            }
        },

        formatTime(isoTime) {
            return new Date(isoTime).toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
        },

        init() {
            this.getLocation();
        }
    };
}

document.addEventListener('alpine:init', () => {
    window.Alpine.data('weatherWidget', weatherWidget)
})
