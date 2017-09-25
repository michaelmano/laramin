@extends('laramin::layouts.base')

@section('base-content')
	@include('laramin::partials._header')
	@yield('standard-content')
	@include('laramin::partials._footer')
@endsection