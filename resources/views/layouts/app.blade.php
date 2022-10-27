<!DOCTYPE html>
<html lang="{{ \Illuminate\Support\Str::of(app()->getLocale())->lower()->kebab() }}"
    class="min-h-screen {{ $htmlClass ?? '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }

    </style>

    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    @stack('styles')
</head>

<body class="">


    @include('layouts.nav')
    @yield('content')

    @stack('scripts')
    @livewireScripts

</body>

</html>
