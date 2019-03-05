<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="apple-mobile-web-app-title" content="Laravel Elites">
    <meta name="application-name" content="Laravel Elites">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($user))
        <meta property="og:title" content="{{ $user->name . ' is a Laravel Elite!' }}">
        <meta property="og:url" content="{{ config('app.url') }}/certificate/{{ $user->slug }}">
    @else
        <meta property="og:title" content="{{ 'Laravel Elites' }}">
        <meta property="og:url" content="{{ config('app.url') }}">
    @endif
        <meta property="og:description" content="Do you have what it takes to join the inner circle?">
        <meta name="twitter:card" content="summary">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body class="bg-orange-lightest font-sans font-normal antialiased">
    <div id="app">
        @yield('content')
    </div>
    
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
