<template>
	<span class="Tooltip"><slot></slot></span>
</template>

<script>
	import Tooltip from 'tooltip.js';
	
	export default {
 		props: {
            tooltip: {
                default: 'No tool tip provided.',
                type: String
			}, 
			trigger: {
				default: 'hover',
				type: String
			},
			animation: {
				default: 'flipInX',
				type: String
			},
			placement: {
				default: 'left',
				type: String
			}
        },
		mounted() {
			const message = new Tooltip(this.$el, {
				title: this.tooltip,
				trigger: this.trigger,
				placement: this.placement,
				template: '<div class="Tooltip__text" role="tooltip"><div class="tooltip__inner"></div></div>',
			});

			if (this.trigger.includes('click')) {
				this.$el.addEventListener('click', function() {
					setTimeout(function() {
						message.hide();
					}, 5000);
				})	
			}
		},

	}
</script>
