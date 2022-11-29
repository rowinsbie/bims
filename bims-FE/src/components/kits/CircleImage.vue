<script lang="ts">
import  { defineComponent } from 'vue';

    export default defineComponent({
        props:[
        'width',
        'height',
        'imgSrc'
        ],
        data() {
            return {
            }
        },
        computed: {
        imgWidth() { 
            return "width:"+this.width+"rem";
        },
        imgHeight() {
            return "height:"+this.height+"rem";
        }
    }
    })
</script>
<template>
    <div class="circle">
        <img   class="" :style="[imgWidth,imgHeight]" :src=imgSrc />
    </div>
</template>
<style lang="scss">
.circle {
    border-radius: 50%;
    overflow: hidden;
    justify-content: center;
    align-items: center;
    max-width: fit-content;
    border: 3px solid rgb(238, 90, 4);
}
</style>