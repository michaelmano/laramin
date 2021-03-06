import Vue from 'vue';
import data from './lib/default/data';
import watch from './lib/default/watch';
import methods from './lib/default/methods';

const module = function module() {
    Vue.component('laramin-loader', require('./components/Loader.vue'));
    Vue.component('laramin-simple-loader', require('./components/SimpleLoader.vue'));
    Vue.component('laramin-modal', require('./components/Modal.vue'));
    Vue.component('laramin-navigation-burger', require('./components/NavigationBurger.vue'));
    Vue.component('laramin-sidebar', require('./components/Sidebar.vue'));
    Vue.component('laramin-sidebar-item', require('./components/SidebarItem.vue'));
    Vue.component('laramin-tooltip', require('./components/Tooltip.vue'));
    Vue.component('laramin-flash', require('./components/Flash.vue'));
    Vue.component('laramin-tags-input', require('./components/TagsInput.vue'));
    Vue.component('laramin-tabs', require('./components/Tabs.vue'));
    Vue.component('laramin-tab', require('./components/Tab.vue'));
    Vue.component('laramin-crop', require('./components/Cropper.vue'));
  
    window.laramin = new Vue({
        el: '#laramin',
        data,
        watch,
        methods,
    });
}

export default module;