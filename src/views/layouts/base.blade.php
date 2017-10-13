<!doctype html>
<html lang="{{ app()->getLocale() }}" xmlns:xlink="http://www.w3.org/1999/xlink">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name') ?? 'Laramin' }} - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('michaelmano/laramin/css/laramin.css') }}">
        @stack('styles')
    </head>
<body class="Body">
    <div id="laramin" class="Laramin">
        @include('laramin::partials._errors')
        @yield('base-header')
        <main class="Main">
            @yield('base-content')
        </main>
    </div>
</body>

<script src="{{ asset('michaelmano/laramin/js/laramin.js') }}"></script>
@stack('scripts')
</html>