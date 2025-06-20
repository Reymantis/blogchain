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
    @livewireStyles

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @include('cookie-consent::cookie-consent-head')


    @if (! filament()->hasDarkMode())
        <script>
            localStorage.setItem('theme', 'light')
        </script>
    @elseif (filament()->hasDarkModeForced())
        <script>
            localStorage.setItem('theme', 'dark')
        </script>
    @else
        <script>
            const loadDarkMode = () => {
                // Respect existing theme selection if it exists
                window.theme = localStorage.getItem('theme') ?? @js(filament()->getDefaultThemeMode()->value)

                    // Ensure the theme is always saved to localStorage
                    localStorage.setItem('theme', window.theme)

                if (
                    window.theme === 'dark' ||
                    (window.theme === 'system' &&
                        window.matchMedia('(prefers-color-scheme: dark)').matches)
                ) {
                    document.documentElement.classList.add('dark')
                } else {
                    document.documentElement.classList.remove('dark')
                }
            }
            loadDarkMode()
            document.addEventListener('livewire:navigated', loadDarkMode)
        </script>
    @endif


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
@livewireScriptConfig
@filamentScripts
@include('cookie-consent::cookie-consent-body')
</body>
</html>
