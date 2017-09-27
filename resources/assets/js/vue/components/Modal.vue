<template>
    <div class="Modal">
        <header class="Modal__header">
            <h4><slot name="title"></slot></h4>
            <button class="Modal__close">
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
</template>
<script>
    export default {
        data () {
        return {}
        }
    }
</script>
<style lang="scss">
    .Modal {
        border: 1px solid #ccc;
    }
</style>