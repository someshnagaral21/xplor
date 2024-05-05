<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <!-- Header -->
    @include('layouts.header')

    <div class="container">
        <div class="row mt-3">
            <!-- Main Content -->
            <div class="col-md-12">
                <div class="p-4 mb-3 rounded">
                @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')
    
    <!-- Scripts -->
    @yield('footer_scripts')
</body>
</html>
