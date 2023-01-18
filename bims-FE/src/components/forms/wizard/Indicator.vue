<template>
    <div class='p-1 mr-3 mb-3 '>
        <!-- <div :class="[currentStep == tabIndex ? 'bg-warning ': currentStep > 0 && tabIndex < currentStep ? 'bg-validated' : 'bg-dark' ]" > -->
        <div :class="['step-info container',currentStep == tabIndex ? 'current-active': currentStep > 0 && tabIndex < currentStep ? 'validated' : 'default-step' ]">  
       
           {{stepDetail[tabIndex].label}}
        </div>
            
        <!-- </div> -->
    </div>
</template>
<script setup lang="ts">
import { computed, inject } from 'vue';
const stepDetail = inject('STEP_INFO');


</script>
<script  lang="ts">
import  { defineComponent } from 'vue';

export default defineComponent({
    props:[
        'tabIndex',
        'currentStep',
        'isValid',
        'validationSchema'
    ]
});
</script>

<style lang="scss">
    .indicator-container {
        color: white;
        display: flex;
        gap: 10px;
        max-width: 100% !important;
        height:auto;
       
    }

    .step-info {
        display:flex !important;
        color:black;
        border-style:solid;
        border-width: 0px 0em 5px 0;
    }

    .default-step {
         border-color:#f2f2f2;
    }

    .validated {
        border-color:#198754;
    }

    .current-active {
        border-color:#09689c;
    }

    

 
</style>