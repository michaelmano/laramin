<template>
	<transition :enter-active-class="'animated ' + animationIn" :leave-active-class="'animated ' + animationOut">
		<div v-show="show" :class="['Flash__message', 'Flash__message--'+type]" v-text="message"></div>
	</transition>
</template>
<script>
	export default {
		data() {
			return {
				show: false,
			}
		},
		props: {
			type: {
				type: String,
				default: 'success'
			},
			message: {
				type: String,
				required: true
			},
			animationIn: {
                default: 'bounceInLeft',
                type: String
            },
			animationOut: {
                default: 'bounceOutRight',
                type: String
            }
		},
		mounted() {
			setTimeout(function() {
				this.show = true;
			}.bind(this), 100);

			setTimeout(function() {
				this.show = false;
			}.bind(this), 5000)
		}
	}
</script>