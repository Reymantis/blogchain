const clockWidget = () => {
    return {
        time: new Date(),
        location: 'Loading...',
        timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,

        init() {
            // Update time every second
            setInterval(() => {
                this.time = new Date();
            }, 1000);

            // Get user's location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    async (position) => {
                        try {
                            const response = await fetch(
                                ` https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${position.coords.latitude}&longitude=${position.coords.longitude}&localityLanguage=en`
                            );
                            const data = await response.json();
                            this.location = `${data.city}, ${data.countryName}`;
                        } catch (error) {
                            this.location = "Location unavailable";
                        }
                    },
                    () => {
                        this.location = "Location access denied";
                    }
                );
            } else {
                this.location = "Geolocation not supported";
            }
        },

        formatTime() {
            return this.time.toLocaleTimeString("en-US", {
                hour12: true,
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit"
            });
        },

        formatDate() {
            return this.time.toLocaleDateString("en-US", {
                weekday: "long",
                year: "numeric",
                month: "long",
                day: "numeric"
            });
        }
    };
}

document.addEventListener('alpine:init', () => {
    window.Alpine.data('clockWidget', clockWidget)
})
