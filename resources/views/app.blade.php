<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#000000">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('head')
    @vite('resources/js/app.js')

    <title>@yield('title')</title>
</head>
<body class="antialiased flex flex-col min-h-screen"
      style="@if(request()->routeIs('profile') or request()->routeIs('login') or request()->routeIs('register'))
      background-image: url({{ asset('img/blob-scene-light.svg') }});
      background-repeat: no-repeat;
      background-size: cover;
       @endif">
    <div class="fixed top-40 left-0 z-50 invisible xl:visible bg-white py-4 pr-4">
        <a href="{{ route('home') }}"><img src="{{ asset('img/logo-fh.png') }}" class="max-h-64" alt="E-Mensa"></a>
    </div>
    @include('navbar')
    <main>
        @yield('content')
    </main>
    @include('footer')

    <!-- ermöglicht einfaches Wechseln des Farb-Themes -->
    <script src="https://cdn.jsdelivr.net/npm/theme-change@2.2.0/index.js"></script>
</body>
</html>
