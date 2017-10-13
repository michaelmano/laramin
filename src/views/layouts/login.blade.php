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
	<main id="laramin" class="Main Main--full util-background-delta">
        @include('laramin::partials._flash')
		@yield('login-form')
	</main>
</body>

<script src="{{ asset('michaelmano/laramin/js/laramin.js') }}"></script>
@stack('scripts')
</html>