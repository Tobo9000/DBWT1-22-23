<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="fhtheme">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#000000">
    @vite('resources/js/app.js')

    <title>@yield('title')</title>
</head>

<body class="antialiased flex flex-col min-h-screen">
@yield('header')
@yield('main')
@yield('footer')
</body>
</html>
