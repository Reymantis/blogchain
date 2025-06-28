function weatherWidget() {
    return {
        loading: true,
        error: null,
        weather: null,
        locationName: null,

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
            } catch (err) {
                this.error = "Failed to load weather.";
            }
        },

        async getLocationName(lat, lon) {
            const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`;

            try {
                const res = await fetch(url);
                const data = await res.json();
                this.locationName = data.display_name;
                this.loading = false;
            } catch (err) {
                this.error = "Failed to load location name.";
                this.loading = false;
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
