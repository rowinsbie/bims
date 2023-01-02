<template>
    <div class="progress-container">
       <Indicator title="Resident Information" />
       <Indicator title="Address" />
       <Indicator title="Family Information" />
    </div>
</template>

<script  lang="ts">
import  { defineComponent } from 'vue';
import Indicator from './Indicator.vue';
export default defineComponent({
    components:{
        Indicator
    }
});
</script>

<style lang="scss">
    .progress-container {
        position: relative;
        width: 95% !important;
        background-color: black;
        display: flex;
        margin-left: 10px;
        border-radius: 20px 20px 0px 0px;
    }
</style>