<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="{{ config('app.name', 'Parañaque SAP') }}" name="description" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Parañaque SAP') }}</title>

        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
       

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Styles -->
        @guest
        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
        @endguest
        @auth
        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
        @endauth
        <!-- Scripts -->
        @routes
        <script src="{{ asset(mix('js/app.js')) }}" defer></script>
    
      
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
