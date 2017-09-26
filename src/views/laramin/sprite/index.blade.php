@extends('laramin::layouts.base')

@section('base-content')
	<h4>Sprites</h4>
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