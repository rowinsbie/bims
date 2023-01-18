<template>
  <form @submit="onSubmit" >
    <div class="text-center pb-4">
      <h3>{{props.stepDetail[currentStepIdx].label}}</h3>
    </div>
    <div class='indicator-container'>
            <Indicator v-for="(tabs,index) in stepCounter" :validationSchema="currentSchema"  :currentStep="currentStepIdx" :tabIndex="index" :key="index"/>
    </div>
    <slot />

    <div class="mt-2 text-end">
      <button v-if="hasPrevious" class="btn border " type="button" @click="goToPrev">
        Previous
      </button>
      <button type="submit" class="btn btn-primary ml-5">{{ isLastStep ? 'Submit' : 'Next' }}</button>
    </div>

    <pre>{{ values }}</pre>
  </form>
</template>
<script lang="ts">
import  { defineComponent } from 'vue';
import Indicator from '@/components/forms/wizard/Indicator.vue';
export default defineComponent({
    components:{
        Indicator
    }
});

</script>
<script setup lang="ts">
import { useForm } from 'vee-validate';
import { ref, computed, provide } from 'vue';

const props = defineProps({
  validationSchema: {
    type: Array,
    required: true,
  },
  stepDetail: {
    type:Array,
  }
});

const emit = defineEmits(['submit']);
const currentStepIdx = ref(0);
const stepCounter = ref(0);
provide('STEP_COUNTER', stepCounter);


provide('CURRENT_STEP_INDEX', currentStepIdx);


// if this is the last step
const isLastStep = computed(() => {
  return currentStepIdx.value === stepCounter.value - 1;
});

// If the `previous` button should appear
const hasPrevious = computed(() => {
  return currentStepIdx.value > 0;
});

// extracts the indivdual step schema
const currentSchema = computed(() => {
  return props.validationSchema[currentStepIdx.value];
});



const { values, handleSubmit } = useForm({
  // vee-validate will be aware of computed schema changes
  validationSchema: currentSchema,
  // turn this on so each step values won't get removed when you move back or to the next step
  keepValuesOnUnmount: true,
});

// We are using the "submit" handler to progress to next steps
// and to submit the form if its the last step
const onSubmit = handleSubmit((values) => {

  
  if (!isLastStep.value) {
    currentStepIdx.value++;

    return;
  }

  // Let the parent know the form was filled across all steps
  emit('submit', values);
});

function goToPrev() {
  if (currentStepIdx.value === 0) {
    return;
  }
currentStepIdx.value--;
  
}
</script>
