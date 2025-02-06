<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <div class="w-full h-screen bg-center bg-cover bg-no-repeat relative" style="background-image: url({{asset('assets/images/background.jpg')}})">
        <div class="w-full absolute top-0 left-0 w-full h-full grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 lg:bg-gradient-to-r md:bg-gradient-to-r from-black/20 to-black/10 ">
            <div class="w-full h-full flex flex-col justify-center items-center lg:px-4 md:px-4 sm:px-32 px-4">
                <!-- Form -->
                {{$slot}}
            </div>
            <div class="w-full lg:flex md:flex hidden">

            </div>
        </div>
    </div>
    </body>
</html>
