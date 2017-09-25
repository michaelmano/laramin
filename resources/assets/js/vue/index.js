import Vue from 'vue';

Vue.component('vue-modal', require('./components/Modal.vue').default);

const module = function module() {

  new Vue({
    el: '#laramin',
    data: {}
  });
}

export default module;