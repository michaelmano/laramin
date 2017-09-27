import Vue from 'vue';

Vue.component('laramin-modal', require('./components/Modal.vue'));

const module = function module() {
  new Vue({
    el: '#laramin',
    data: {}
  });
}

export default module;