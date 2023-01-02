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
    max-width: auto !important;
    margin-left: 260px !important;
}
@media screen and (max-width: $xsAndsm),
screen and (max-width:$xsAndsm) {
    .layout-component {
        margin-top: 30px !important;
        margin-left: unset !important;
        font-size: 10px !important;
    }
}
</style>