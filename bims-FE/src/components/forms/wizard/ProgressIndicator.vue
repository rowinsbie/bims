<template>
    <div class="progress-container">
       <Indicator v-for="(step,index) in steps" :stepIndex="index" :key="index" :title="step.title" :class="[active == index ? 'bg-active' : 'bg-dark text-inactive',steps[active].isValid == true ? 'bg-success':'']" />
      
    </div>
</template>

<script  lang="ts">
import  { defineComponent } from 'vue';
import Indicator from './Indicator.vue';
export default defineComponent({
    props:[
        'steps',
        'active'
    ],
    components:{
        Indicator
    }
});
</script>

<style lang="scss">
    .progress-container {
        position: relative;
        max-width: 100% !important;
        background-color: black;
        display: flex;
        
    }

    .text-inactive {
        color: rgb(128, 128, 128);
    }
    .bg-active {
        background: rgb(233, 95, 71);
    }
</style>