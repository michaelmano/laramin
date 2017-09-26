<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name') ?? 'Laramin' }} - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('michaelmano/laramin/css/laramin.css') }}">
    </head>
<body>
    @include('laramin::partials._sprite')
    <div id="laramin">
	    @yield('base-content')
    </div>
</body>
<script src="{{ asset('michaelmano/laramin/js/laramin.js') }}" async defer></script>
</html>