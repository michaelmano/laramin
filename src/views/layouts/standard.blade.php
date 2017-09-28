@extends('laramin::layouts.base')

@section('base-header')
	@include('laramin::partials._header')
@endsection

@section('base-content')
	@include('laramin::components.sidebar')
	<div class="Container">
		@yield('standard-content')
	</div>
@endsection

@section('base-footer')
	@include('laramin::partials._footer')
@endsection