import Vue from 'vue';

const module = function module() {
    Vue.component('laramin-modal', require('./components/Modal.vue'));
  
    new Vue({
        el: '#laramin',
        methods: {
            showModal(name) {
                this.$refs[name].show = true;
            }
        }
    });
}

export default module;