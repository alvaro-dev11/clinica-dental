<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- ICONSCOUT -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/a9045ee35a.js" crossorigin="anonymous"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/main.css', 'resources/css/about.css', 'resources/css/contact.css', 'resources/css/home.css', 'resources/css/owl.carousel.min.css', 'resources/css/owl.theme.default.min.css', 'resources/css/responsive.css', 'resources/css/swiper-bundle.min.css', 'resources/css/testimonials.css', 'resources/js/app.js', 'resources/js/main.js', 'resources/js/slider.js', 'resources/js/about-slider.js', 'resources/js/testimonials-slider.js', 'resources/js/owl.carousel.min.js', 'resources/js/swiper-bundle.min.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        {{-- @include('layouts.navigation') --}}

        @livewire('navigation')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
