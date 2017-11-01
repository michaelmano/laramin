<template>
	<div class="Tabs">
        <ul role="tablist" class="Tabs__list">
            <li v-for="tab in tabs" v-show="tab.isVisible" class="Tabs__list-item" role="presentation">
                <a v-html="tab.header" :aria-controls="tab.hash" :aria-selected="tab.isActive" @click="selectTab(tab.hash, $event)" :href="tab.hash" :class="['Tabs__list-link', tab.isActive ? 'is-active' : '']" role="tab"></a>
            </li>
        </ul>
        <div class="Tabs__panels">
            <slot/>
        </div>
    </div>
</template>

<script>
	export default {
		data() {
			return {
				tabs: [],
			}
		},
		mounted() {
			this.tabs = this.$children;
			if (window.location.hash) {
				this.tabs.forEach(tab => {
					if (tab.$refs[window.location.hash]) tab.isActive = true;
				});
			} else {
				this.tabs[0].isActive = true;
			}
		},
		methods: {
			selectTab(hash) {
				this.tabs.forEach(tab => {
					if (tab.hash === hash) {
						tab.isActive = true;
					} else {
						tab.isActive = false;
					}
				});
			}
		}
	}
</script>