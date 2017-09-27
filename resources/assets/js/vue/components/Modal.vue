<template>
    <div class="Modal">
        <transition enter-active-class="animated bounceInRight" leave-active-class="animated bounceOutLeft">
            <div class="Modal__overlay" v-show="show"></div>
        </transition>
        <transition enter-active-class="animated bounceInLeft" leave-active-class="animated bounceOutRight">
            <div class="Modal__content" v-show="show">
                <header class="Modal__header">
                    <h4><slot name="title"></slot></h4>
                    <button class="Modal__close" @click="show = false">
                        <svg class="Icon Icon--small"><use xlink:href="#icon-times"></use></svg>
                    </button>
                </header>
                <div class="Modal__body">
                    <slot name="body"></slot>
                    </div>
                <footer class="Modal__footer">
                    <slot name="footer"></slot>
                </footer>
            </div>
        </transition>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                show: false,
            }
        },
    }
</script>