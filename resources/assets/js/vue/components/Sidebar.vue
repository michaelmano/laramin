<template>
	<aside :class="['Sidebar', open ? 'Sidebar--open' : '']">
		<slot></slot>
	</aside>
</template>

<script>
	export default {
		props: {
			open: {
				default: false,
				type: Boolean,
			}
		},
	}
</script>