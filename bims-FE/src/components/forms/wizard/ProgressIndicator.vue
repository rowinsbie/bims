<template>
    <div class="progress-container">
        <Indicator
            v-for="(step, index) in steps"
            :stepIndex="index"
            :key="index"
            :title="step.title"
            :isValid="steps[index].isValid "
            :activeTab="active"
        />
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import Indicator from "./Indicator.vue";
export default defineComponent({
    props: ["steps", "active", "isValid"],
    components: {
        Indicator,
    },
    
});
</script>

<style lang="scss">
.progress-container {
    position: relative;
    max-width: 100% !important;
    background-color: black;
    display: flex;
}


</style>
