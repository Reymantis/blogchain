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
</body>
</html>
