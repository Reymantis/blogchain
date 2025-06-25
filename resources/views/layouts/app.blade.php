@php use App\Helpers\Keywords; @endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ rightSidebarOpen: false, leftSidebarOpen: false,  }" x-resize="rightSidebarOpen = true; leftSidebarOpen = true "
      class="min-h-screen scroll-smooth "

>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ isset($title) ? $title .' | '. config('app.name') : config('app.name')  }}</title>
    <meta name="title" content="{{  isset($title) ? $title .' | '. config('app.name') : config('app.name') }}">
    <meta name="description" content="{{ isset($description) ? $description : config('blogchain.description') }}">
    <meta name="keywords" content="{{ isset($keywords) ? Keywords::toString($keywords) : config('blogchain.keywords') }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="{{  isset($title) ? $title .' | '. config('app.name') : config('app.name') }}">
    <meta property="og:title" content="{{  isset($title) ? $title .' | '. config('app.name') : config('app.name') }}">
    <meta property="og:description" content="{{ isset($description) ? $description : config('blogchain.description') }}">
    <meta property="og:image" content="{{ config('blogchain.og-image') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="title" content="{{  isset($title) ? $title .' | '. config('app.name') : config('app.name') }}">
    <meta name="twitter:title" content="{{  isset($title) ? $title .' | '. config('app.name') : config('app.name') }}">
    <meta name="twitter:description" content="{{ isset($description) ? $description : config('blogchain.description') }}">
    <meta name="twitter:image" content="{{ config('blogchain.og-image') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ config('app.url') }}">
    <!-- Favicon and Apple Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>


    <!-- Styles / Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{--    @livewireStyles--}}

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @include('cookie-consent::cookie-consent-head')

    <script>
        const applyTheme = (theme) => {
            if (theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark'); // Or 'system' if you want to persist that choice
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light'); // Or 'system'
            }
        };

        const initializeTheme = () => {
            let theme = localStorage.getItem('theme');
            if (!theme) {
                // If no theme in localStorage, check system preference
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    theme = 'dark';
                } else {
                    theme = 'light'; // Default to light if no system preference for dark
                }
            }
            // Set window.theme for any Alpine components that might use it directly,
            // though it's better for them to react to the class on <html> or localStorage changes.
            window.theme = theme;
            applyTheme(theme);
        };

        initializeTheme();
        document.addEventListener('livewire:navigated', initializeTheme);

        // Optional: Listen for changes in system theme preference
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
            if (localStorage.getItem('theme') === 'system' || !localStorage.getItem('theme')) { // Only if user hasn't set a firm preference
                initializeTheme(); // Re-evaluate and apply
            }
        });
    </script>


</head>
<body class="min-h-screen pt-20 bg-gray-50 max-w-full flex flex-col p-2 text-gray-800 gap-4 dark:text-gray-200
dark:bg-gray-950 overflow-x-clip dark:from-gray-900 dark:to-gray-950
selection:bg-primary-400/50
selection:text-primary-50">

<div x-data="loader()" x-show="isVisible" class="grid fixed inset-0 z-[1000] bg-gray-50 dark:bg-gray-900  place-items-center overflow-clip ">
    <svg class="w-16 h-16 animate-spin-fast text-gray-900/50 dark:text-primary-200" viewBox="0 0 64 64" fill="none"
         xmlns="http://www.w3.org/2000/svg" width="24" height="24">
        <path
            d="M32 3C35.8083 3 39.5794 3.75011 43.0978 5.20749C46.6163 6.66488 49.8132 8.80101 52.5061 11.4939C55.199 14.1868 57.3351 17.3837 58.7925 20.9022C60.2499 24.4206 61 28.1917 61 32C61 35.8083 60.2499 39.5794 58.7925 43.0978C57.3351 46.6163 55.199 49.8132 52.5061 52.5061C49.8132 55.199 46.6163 57.3351 43.0978 58.7925C39.5794 60.2499 35.8083 61 32 61C28.1917 61 24.4206 60.2499 20.9022 58.7925C17.3837 57.3351 14.1868 55.199 11.4939 52.5061C8.801 49.8132 6.66487 46.6163 5.20749 43.0978C3.7501 39.5794 3 35.8083 3 32C3 28.1917 3.75011 24.4206 5.2075 20.9022C6.66489 17.3837 8.80101 14.1868 11.4939 11.4939C14.1868 8.80099 17.3838 6.66487 20.9022 5.20749C24.4206 3.7501 28.1917 3 32 3L32 3Z"
            stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path
            d="M32 3C36.5778 3 41.0906 4.08374 45.1692 6.16256C49.2477 8.24138 52.7762 11.2562 55.466 14.9605C58.1558 18.6647 59.9304 22.9531 60.6448 27.4748C61.3591 31.9965 60.9928 36.6232 59.5759 40.9762"
            stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-900 dark:text-primary-500">
        </path>
    </svg>
</div>

<x-navigation/>
<div class="flex flex-rows gap-4 flex-1 relative max-w-full overflow-x-clip">
    <x-parts.left-sidebar>
        {{ $leftSidebar ?? '' }}
    </x-parts.left-sidebar>
    <main class="flex-1 ">
        {{ $slot }}
    </main>
    <x-parts.right-sidebar>
        {{ $rightSidebar ?? '' }}
    </x-parts.right-sidebar>
</div>
<x-footer/>
<x-navigation.mobile-native/>
@livewire('notifications')
@filamentScripts
@livewireScriptConfig
@include('cookie-consent::cookie-consent-body')


<script>
    function loader() {
        return {
            isVisible: false,
            minDelayTimer: null,

            showLoader() {
                this.isVisible = true;
            },

            hideLoader() {
                // Clear any previous timeout
                if (this.minDelayTimer) clearTimeout(this.minDelayTimer);

                // Force minimum 2s display time
                this.minDelayTimer = setTimeout(() => {
                    this.isVisible = false;
                }, 2000);
            }
        };
    }

    document.addEventListener('livewire:init', () => {
        const loaderInstance = loader();

        // Show loader when Livewire starts navigating
        window.Livewire.on('navigate', () => {
            loaderInstance.showLoader();
        });

        // Hide loader after Livewire has rendered new page content
        window.Livewire.on('navigated', () => {
            loaderInstance.hideLoader();
        });
    });
</script>
</body>
</html>
