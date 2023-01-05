<template>
    <div class="indicator-container" :class="[activeTab == stepIndex ? 'bg-active': isValid ? 'bg-validated ':'']">
        <div class="icon">  
            <font-awesome-icon v-if="activeTab == stepIndex" icon="fa-solid fa-file-pen" />
            <font-awesome-icon v-else-if="activeTab !== stepIndex && !isValid" icon="fa-solid fa-file-circle-exclamation" />
            <font-awesome-icon  v-else="isValid && activeTab !== stepIndex" icon="fa-solid fa-file-circle-check" />
        </div>
            <div class="label-pending">
           {{title}}  
        </div>        
    </div>
</template>

<script  lang="ts">
import  { defineComponent } from 'vue';

export default defineComponent({
    props:{
        title:String,
        icon:String,
        key:Number,
        stepIndex:Number,
        isValid:Boolean,
        activeTab:Number
    }
});
</script>

<style lang="scss">
    .indicator-container {
        color: white;
        padding: 1rem 1rem;
        display: flex;
        gap: 10px;
        max-width: 100% !important;

    }

    .text-inactive {
        color: rgb(128, 128, 128);
    }
    .bg-active {
        background: rgb(233, 95, 71);
    }
    .bg-validated {
        background-color: rgb(0, 136, 72);
        border-width: 0px 3px 0px 0px;
        border-style: solid;
        border-color: rgb(0, 61, 38);
    }
</style>