<template>
	<button :class="['NavigationToggle', open ? 'NavigationToggle--open' : '']" @click.prevent="openNavigation">
		<span class="NavigationToggle__burger"></span>
		<span class="NavigationToggle__burger"></span>
		<span class="NavigationToggle__burger"></span>
		<span class="NavigationToggle__burger"></span>
		<span class="NavigationToggle__burger"></span>
		<span class="NavigationToggle__burger"></span>
	</button>
</template>

<script>
	export default {
		data() {
			return {
				open: false,
			}
		},
		methods: {
			openNavigation() {
				this.$emit('toggle-navigation');
				this.open = !this.open;
			}
		}
	}
</script>