@extends('laramin::layouts.standard')

@section('standard-content')
	<div id="example">
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
		<h4>Tags</h4>
		<div class="Tag">
			<div class="Tag__name">Tag with info</div>
			<div class="Tag__info">v2</div>
		</div>
		<div class="Tag">
			<div class="Tag__name">Tag without info</div>
		</div>

		<div class="Tag">
			<div class="Tag__name">Tag with delete <svg class="Tag__remove"><use xlink:href="#icon-times"></use></svg></div>
		</div>

		<h4>Tooltips</h4>

		<span class="Tooltip">Hover me.
			<span class="Tooltip__text">This is the hovvver</span>
		</span>
		<h4>Sprites</h4>
		
		<button @click="showModal('modal')">Show Modal</button>
		<laramin-modal ref="modal" @close="hideModal">
			<template slot="title">Modal</template>
			<template slot="body">
				<p>Modal Body Content</p>
			</template>
			<p slot="footer">Footer Content</p>
		</laramin-modal>

		<button @click="showModal('modal1')">Show Modal 1</button>
		<laramin-modal ref="modal1" @close="hideModal">
			<template slot="title">Modal 1</template>
			<template slot="body">
				<p>Modal Body Content</p>
			</template>
			<p slot="footer">Footer Content</p>
		</laramin-modal>
		
		<div id="sprite-example" class="Row">
	
		</div>
	</div>
@endsection

@push('pre-scripts')
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