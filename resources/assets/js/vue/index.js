import Vue from 'vue';
import data from './lib/default/data';
import watch from './lib/default/watch';
import methods from './lib/default/methods';

const module = function module() {
    Vue.component('laramin-modal', require('./components/Modal.vue'));
  
    new Vue({
        el: '#laramin',
        data,
        watch,
        methods,
    });
}

export default module;