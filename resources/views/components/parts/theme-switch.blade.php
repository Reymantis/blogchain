<div x-data="{
        theme: localStorage.getItem('theme') || 'system',
        open: false,
        init() {
            // Sync with Filament's initialization
            this.theme = localStorage.getItem('theme') || 'system';
            this.syncTheme();

            // Watch for storage changes
            window.addEventListener('storage', (e) => {
                if (e.key === 'theme') {
                    this.theme = e.newValue;
                    this.syncTheme();
                }
            });

            // Watch system preference changes
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                if (this.theme === 'system') {
                    this.syncTheme();
                }
            });
        },
        syncTheme() {
            // Save to localStorage
            localStorage.setItem('theme', this.theme);

            // Apply to document
            const isDark = this.theme === 'dark' ||
                         (this.theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);

            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }

            // Force Livewire to update if needed
            window.dispatchEvent(new CustomEvent('theme-changed', { detail: this.theme }));
        }
    }"
     class="relative inline-block text-left text-xs">

    <!-- Button trigger -->
    <button @click="open = !open"
            class="inline-flex items-center justify-center size-8 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
            aria-label="Theme selector">
        <!-- Dynamic icon based on current theme -->
        <template x-if="theme === 'light'">
            <x-heroicon-s-sun class="size-4"/>
        </template>
        <template x-if="theme === 'dark'">
            <x-heroicon-s-moon class="size-4"/>
        </template>
        <template x-if="theme === 'system'">
            <x-heroicon-s-computer-desktop class="size-4"/>
        </template>
    </button>

    <!-- Dropdown panel -->
    <div x-show="open"
         @click.away="open = false"
         x-transition
         x-cloak
         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 z-50">
        <div class="py-1">
            <button @click="theme = 'light'; syncTheme(); open = false"
                    class="flex items-center px-4 py-2 w-full text-left hover:bg-gray-50 dark:hover:bg-white/5"
                    :class="{'bg-gray-100 dark:bg-white/5': theme === 'light'}">
                <x-heroicon-s-sun class="size-4 mr-2"/>
                Light
            </button>
            <button @click="theme = 'dark'; syncTheme(); open = false"
                    class="flex items-center px-4 py-2 w-full text-left hover:bg-gray-50 dark:hover:bg-white/5"
                    :class="{'bg-gray-100 dark:bg-white/5': theme === 'dark'}">
                <x-heroicon-s-moon class="size-4 mr-2"/>
                Dark
            </button>
            <button @click="theme = 'system'; syncTheme(); open = false"
                    class="flex items-center px-4 py-2 w-full text-left hover:bg-gray-50 dark:hover:bg-white/5"
                    :class="{'bg-gray-100 dark:bg-white/5': theme === 'system'}">
                <x-heroicon-s-computer-desktop class="size-4 mr-2"/>
                System
            </button>
        </div>
    </div>
</div>
