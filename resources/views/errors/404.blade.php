<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Bloggist') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-900 text-white">
        <main class="h-screen">
            <div class="h-full max-w-3xl mx-auto">
                <div class="h-full grid grid-cols-2 gap-10 items-center justify-center">
                    <div class="col-span-2 md:col-span-1">
                        <img src="{{asset('undraw_handcrafts_cat.svg')}}" alt="404 page not found" class="w-2/3 mx-auto">
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-4xl font-light">{{ __("Happy 404 day!") }}</p>
                        <p class="mt-6">{{ __("No, really. This page doesn't exist.") }}<br>You can <a href="{{ url()->previous() }}" class="text-amber-400">go back</a> or visit our <a href="{{ route('home') }}" class="text-amber-400">home page</a> for more interesting reads.</p>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
