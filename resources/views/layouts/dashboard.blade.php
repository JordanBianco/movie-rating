<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        @livewireStyles
    </head>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 text-gray-900">
            @include('layouts.navigation')

            <div class="flex">
                <div class="w-60">
                    @include('layouts.sidebar')
                </div>

                <!-- Page Content -->
                <main class="w-4/5 mr-16 pt-10 min-h-screen ml-32">
                    {{ $slot }}
                </main> 
            </div>
        </div>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    </body>
</html>
