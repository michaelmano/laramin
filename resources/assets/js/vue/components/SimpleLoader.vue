<template>
		<div v-show="loading" class="Loader__icon">
			<div class="Loader__square Loader__square1"></div>
			<div class="Loader__square Loader__square2"></div>
			<div class="Loader__square Loader__square3"></div>
			<div class="Loader__square Loader__square4"></div>
			<div class="Loader__square Loader__square5"></div>
			<div class="Loader__square Loader__square6"></div>
			<div class="Loader__square Loader__square7"></div>
			<div class="Loader__square Loader__square8"></div>
			<div class="Loader__square Loader__square9"></div>
		</div>
</template>
<script>
	export default {
		props: {
			loading: {
				default: false,
				type: Boolean
			}
		}
	}
</script>