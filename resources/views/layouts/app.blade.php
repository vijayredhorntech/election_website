<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome Icons -->
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{asset('assets/css/argon-dashboard-tailwind.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    @yield('extraLib')

    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 3px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: green;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: white;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

    @stack('styles')
</head>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500 relative">
    @yield('alertBox')


    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    @include('layouts.sidebar')
    <main class="relative h-full min-h-screen transition-all duration-200 ease-in-out xl:ml-64 " style="background: linear-gradient(rgba(0,0,0,0.78), rgba(0,0,0,0.68)), url({{asset('assets/img/bg1.jpg')}}); background-size: cover; background-position: center;">

        @include('layouts.navbar')
        <div class="w-full p-6 mx-auto min-h-screen ">
            <div class="pb-12 pt-4">
                {{$slot}}
            </div>
            @include('layouts.footer')
        </div>
    </main>



</body>
<script type="module" src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<script src="{{ asset('assets/js/argon-dashboard-tailwind.js') }}" async></script>

@stack('scripts')

</html>