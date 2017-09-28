<!doctype html>
<html lang="{{ app()->getLocale() }}" xmlns:xlink="http://www.w3.org/1999/xlink">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name') ?? 'Laramin' }} - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('laramin/css/laramin.css') }}">
        @stack('styles')
    </head>
<body class="Body">
    @include('laramin::partials._sprite')
    <div id="laramin" class="Laramin">
        @yield('base-header')
        <main class="Main">
            @yield('base-content')
        </main>
        @yield('base-footer')
    </div>
</body>

@stack('pre-scripts')
<script src="{{ asset('laramin/js/laramin.js') }}"></script>
@stack('scripts')
</html>