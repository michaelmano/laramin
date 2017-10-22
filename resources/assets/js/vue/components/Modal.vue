<template>
    <div class="Modal">
        <transition enter-active-class="animated fadeIn" leave-active-class="animated fadeOut">
            <div class="Modal__overlay" v-show="show"></div>
        </transition>
        <transition :enter-active-class="'animated ' + animationIn" :leave-active-class="'animated ' + animationOut">
            <div class="Modal__container" v-show="show">
                <div class="Modal__content">
                    <header class="Modal__header">
                        <h6 class="Modal__title"><slot name="title"></slot></h6>
                        <button class="Modal__close" @click="hideModal()">
                            <i class="fa fa-times"></i>
                        </button>
                    </header>
                    <div class="Modal__body">
                        <div class="Content">
                            <slot name="body"></slot>
                        </div>
                    </div>
                    <footer class="Modal__footer">
                        <small><slot name="footer"></slot></small>
                    </footer>
                </div>
            </div>
        </transition>
    </div>
</template>
<script>
    export default {
        props: {
            animationIn: {
                default: 'bounceInLeft',
                type: String
            },
            animationOut: {
                default: 'bounceOutRight',
                type: String
            }
        },
        data () {
            return {
                show: false,
            }
        },
        methods: {
            hideModal() {
                this.$emit('close');
            }
        }
    }
</script>