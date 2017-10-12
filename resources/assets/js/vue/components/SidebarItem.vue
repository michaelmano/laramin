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
				active: window.location.href.replace('http://' + window.location.hostname, '') === this.url
			}
		}
	}
</script>