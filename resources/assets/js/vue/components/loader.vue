<template>
	<transition enter-active-class="animated fadeIn" leave-active-class="animated fadeOut">
		<div v-show="loading" class="Loader">
			<div class="Loader__icon">
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
		</div>
	</transition>
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