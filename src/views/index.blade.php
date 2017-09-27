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
	<h4>Sprites</h4>

	<laramin-modal>
		<h4 slot="title">Modal Title Here</h4>
		<p slot="body">
			Modal Body Content
		</p>
		<p slot="footer">Footer Content</p>
	</laramin-modal>
	
	<div id="sprite-example" class="Row">

	</div>
@endsection

@push('scripts')
<script>
	// Run through the sprite and print out all of the icons.
	var sprite = document.getElementById('sprite');
	var spriteExample = document.getElementById('sprite-example');
	sprite.childNodes.forEach(function(element) {
		var container = document.createElement('div');
		var icon = document.createElement('svg');
		var use = document.createElement('use');
		container.classList = 'Cell Cell--3/12@xs Cell--2/12@md Cell--1/12@lg';
		use.setAttribute('xlink:href', '#' + element.id);
		icon.classList = 'Icon Icon--small';
		icon.appendChild(use);
		icon.title = '<svg class="Icon Icon--small"><use xlink:href="#' + element.id + '"></use></svg>';
		container.appendChild(icon);
		spriteExample.appendChild(container);
	});
</script>
@endpush