<template>
    <div class="indicator-container">
        <div class="icon">
            <font-awesome-icon class="pending" icon="fa-solid fa-circle-check" />
        </div>
        <div class="label-pending">
           {{title}}  
        </div>
        
               <span class=" btn-success">{{stepIndex}}</span> 
        
    </div>
</template>

<script  lang="ts">
import  { defineComponent } from 'vue';

export default defineComponent({
    props:{
        title:String,
        icon:String,
        key:Number,
        stepIndex:Number
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
</style>