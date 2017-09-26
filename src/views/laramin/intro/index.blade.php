@extends('laramin::layouts.base')

@section('base-content')
	@component('laramin::components.sidebar')
		<h3>this is the sidebar content.</h3>
	@endcomponent
	<h1>Welcome to the Laramin Dashboard</h1>
	<h4>Grid System</h4>
	<p>This package uses the Buzuki grid system, the documentation can be found <a href="https://buzuki.pixls.com.au/">https://buzuki.pixls.com.au/</a> and the github can be found <a href="https://github.com/enzyme/buzuki">https://github.com/enzyme/buzuki</a></p>
	<h4>Qoob Library</h4>
	<p>Qoob is a lightweight DOM manipulation library and the documentation and github can be found at <a href="https://github.com/enzyme/qoob">https://github.com/enzyme/qoob</a></p>
	<h4>Vue Components</h4>
	<ul>
		<li>list of components.</li>
	</ul>
@endsection