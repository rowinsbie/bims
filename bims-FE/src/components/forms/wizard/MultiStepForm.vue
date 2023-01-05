<template>
   <div>
    <ProgressIndicator :steps="steps"  :active="activeStepIndex" />
   
            <form @submit.prevent="nextStep">
                <div class="card">
                    <div class="card-body">
                        <div v-for="(step,index) in steps"  :key="index" :id="'step'+(index+1)" v-show="activeStepIndex == index" class="step-content">
                            <slot :name="'headerPage'+(index+1)"></slot>
                            <slot :name="'step'+(index+1)"></slot>
                        </div>
                       
                        <!-- footer with actions of the multi step form -->
                        <div class="text-end card-footer mt-4">
                            <slot name="footer" >
                                <button type="submit" v-if="activeStepIndex >= 1" @click.prevent="prevStep" class=" btn border">previous</button>
                
                                <button type="submit" class=" btn btn-primary">Next</button>
                            </slot>
                        </div>
                    </div>
                </div>
            </form>
     
   </div>
</template>

<script  lang="ts">
import  { defineComponent } from 'vue';
import ProgressIndicator from './ProgressIndicator.vue';
export default defineComponent({
    props:[
        'steps',
        'title'
        
    ],
    components:{
        ProgressIndicator
    },
    data() {
        return {
            activeStepIndex:0,
        }
    },
    mounted() {
       
    },
    methods:{
        nextStep(){
            if(!this.steps[this.activeStepIndex].isValid) {
                this.$emit('validateStep',this.activeStepIndex);
                return false;
            }

            let isFinalStep = ((this.activeStepIndex+1) == this.steps.length);
             if(isFinalStep) {
                this.$emit('onComplete');
                return true;
             }


          
            this.activeStepIndex++;
            while(this.steps[this.activeStepIndex-1].isSkipable === true) {
                this.activeStepIndex++;
            }

        },
        prevStep() {

            if(this.steps[this.activeStepIndex]) {
                this.activeStepIndex--;
            }
          

        }
    }
});
</script>

<style lang="scss">

</style>