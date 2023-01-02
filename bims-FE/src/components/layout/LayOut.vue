<template>
    <div class="container layout-component">
        <div class="row">
            <slot></slot>
        </div>
    </div>
</template>

<script  lang="ts">
import  { defineComponent } from 'vue';

export default defineComponent({

});
</script>

<style lang="scss">
@import '../../assets/_variables.scss';
.layout-component {
    margin-top: 100px !important;
    position:absolute;
    left: 250px;
    right: 250px;
    max-width: calc(100% - 250px) !important;
}
@media screen and (max-width: $xsAndsm),
screen and (max-width:$xsAndsm) {
    .layout-component {
        margin-top: 30px !important;
        left: unset !important;
        right: unset !important;
        max-width: 100% !important;
        font-size: 10px !important;
    }
}
</style>