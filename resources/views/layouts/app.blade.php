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
<a name="TOP"></a>

    @include('layouts.nav')
    @yield('content')
    <button id="to-top-button" onclick="goToTop()" title="Go To Top"
        class="hidden fixed z-90 bottom-8 right-8 border-0 w-10 h-10 rounded-full drop-shadow-md bg-blue-500 text-white text-3xl font-bold">&uarr;</button>

    @stack('scripts')
    @livewireScripts
        <!-- Javascript code -->
        <script>
            var toTopButton = document.getElementById("to-top-button");

            // When the user scrolls down 200px from the top of the document, show the button
            window.onscroll = function () {
                if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                    toTopButton.classList.remove("hidden");
                } else {
                    toTopButton.classList.add("hidden");
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function goToTop() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        </script>

</body>

</html>
