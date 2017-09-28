import Vue from 'vue';
import Q from 'qoob';

const module = function module() {
    Vue.component('laramin-modal', require('./components/Modal.vue'));
  
    new Vue({
        el: '#laramin',
        data: {
            activeModal: null,
        },
        watch: {
            activeModal: function (val) {
                if (null === this.activeModal) {
                    Q.off(window, 'keyup', this.listenForEscape);
                } else {
                    Q.on(window, 'keyup', this.listenForEscape);
                }
            }
        },
        methods: {
            showModal(name) {
                this.$refs[name].show = true;
                this.activeModal = name;
            },
            hideModal() {
                this.$refs[this.activeModal].show = false;
                this.activeModal = null;
            },
            listenForEscape() {
                this.hideModal();
            }
        }
    });
}

export default module;