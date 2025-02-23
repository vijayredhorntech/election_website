<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['title'] ?? 'One Nation Party' }}</title>
    <meta name="description" content="{{ $data['meta_description'] ?? '' }}">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <!-- Header -->
    @include('front.partials.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('front.partials.footer')

    @stack('scripts')
</body>
</html> 