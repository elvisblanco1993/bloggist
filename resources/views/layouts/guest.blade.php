<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body>
        @if (!request()->routeIs('login') && !request()->routeIs('register')
            && !request()->routeIs('password.reset')
            && !request()->routeIs('password.request')
            && !request()->routeIs('two-factor.login'))
            @include('website.partials.nav')
        @endif
        <main class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </main>
        @include('website.partials.footer')

        @stack('modals')
        @livewireScripts
    </body>
</html>
