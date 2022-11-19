<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title . ' | ' . config('app.name', 'Bloggist') }}</title>

        <!-- Scripts -->
        <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased text-gray-900 bg-white">
        @include('website.partials.nav')
        <main class="min-h-screen">
            {{ $slot }}
        </main>
        @include('website.partials.footer')

        @stack('modals')
        @livewireScripts
    </body>
</html>
