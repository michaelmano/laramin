@extends('laramin::layouts.base')

@section('base-content')
	@component('laramin::components.sidebar')
		<h3>this is the sidebar content.</h3>
	@endcomponent
	<h1>Welcome to the Laramin Dashboard</h1>
	<vue-modal></vue-modal>
@endsection