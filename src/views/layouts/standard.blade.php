@extends('laramin::layouts.base')

@section('base-header')
	@include('laramin::partials._header')
@endsection

@section('base-content')
	@include('laramin::components.sidebar')
	<div class="Container Container--has-sidebar">
		@yield('standard-content')
	</div>
@endsection

@section('base-footer')
	@include('laramin::partials._footer')
@endsection