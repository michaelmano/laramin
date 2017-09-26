@extends('laramin::layouts.base')

@section('base-content')
	@component('laramin::components.sidebar')
		<h3>this is the sidebar content.</h3>
	@endcomponent
	<h1>Welcome to the Laramin Dashboard</h1>
	<vue-modal></vue-modal>
	<div id="sprite-example">

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
			var pre = document.createElement('pre');
			use.setAttribute('xlink:href', '#' + element.id);
			icon.classList = 'Icon Icon--small';
			icon.appendChild(use);
			container.appendChild(icon);
			pre.textContent = '<svg class="Icon Icon--small"><use xlink:href="#' + element.id + '"></use></svg>';
			container.appendChild(pre);
			spriteExample.appendChild(container);
		});
	</script>
@endpush