<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- iziToast style css -->
        <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/2f7be104f0.js" crossorigin="anonymous"></script>
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased overscroll-none">
        @inertia

        <!-- iziToast script -->
        <script src="{{ asset('js/iziToast.js') }}"></script>
        @include('vendor.lara-izitoast.toast')
    </body>
</html>
