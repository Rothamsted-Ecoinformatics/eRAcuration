<!DOCTYPE html>
<html lang="{{ \Illuminate\Support\Str::of(app()->getLocale())->lower()->kebab() }}"
    class="min-h-screen {{ $htmlClass ?? '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
        [x-cloak] {
            display: none !important;
        }

    </style>

    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />

    @stack('styles')
</head>

<body class="bg-gradient-to-r from-yellow-100 to-yellow-200">
    <livewire:toasts />
    @include('layouts.nav')
    @yield('content')

    @stack('scripts')
    @livewireScripts
    
</body>

</html>
