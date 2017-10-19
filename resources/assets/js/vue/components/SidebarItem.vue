<template>
	<li :class="['Navigation__list-item', active ? 'Navigation__list-item--active' : '']">
		<a class="Navigation__list-link" :href="url">
			<i class="Navigation__list-icon" v-if="icon" :class="['fa', icon]"></i>
			<slot></slot>
		</a>
	</li>
</template>

<script>
	export default {
		props: {
			url: {
				required: true,
				type: String
			},
			icon: {
				type: String
			}
		},
		data() {
			return {
				active: window.location.pathname === this.url || '/' + window.location.pathname.split( '/' )[1] + '/' + window.location.pathname.split( '/' )[2] === this.url
			}
		}
	}
</script>