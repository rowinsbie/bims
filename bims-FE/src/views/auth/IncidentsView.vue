<template>
    <LayOut>
        <div class="col-lg-12">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <MultiStepForm
                            ref="multiStepForm"
                            @onComplete="submitForm"
                            @validateStep="validateStep"
                            :steps="steps"
                        >
                            <template v-slot:step1>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name">First Name</label>
                                        <input
                                        v-model="steps[0].fields!.firstName"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your first name"
                                        />
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="name">Middle Name</label>
                                        <input
                                        v-model="steps[0].fields!.middleName"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your middle name"
                                        />
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="name">Last Name</label>
                                        <input
                                        v-model="steps[0].fields!.lastName"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your last name"
                                        />
                                    </div>
                                </div>
                            </template>

                            <template v-slot:step2>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name"
                                            >House No. & Lot</label
                                        >
                                        <input
                                        v-model="steps[1].fields!.houseNo"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your House & lot no."
                                        />
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="name">Province</label>
                                        <input
                                        v-model="steps[1].fields!.province"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your Province"
                                        />
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="name">City</label>
                                        <input
                                        v-model="steps[1].fields!.city"
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your City"
                                        />
                                    </div>
                                </div>
                            </template>

                            <template v-slot:step3>
                                <h1>step3</h1>
                            </template>
                            <template v-slot:step4>
                                <h1>step4</h1>
                            </template>
                        </MultiStepForm>
                    </div>
                </div>
            </div>
        </div>
    </LayOut>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import LayOut from "@/components/layout/LayOut.vue";
import MultiStepForm from "@/components/forms/wizard/MultiStepForm.vue";
import Swal from 'sweetalert2'

export default defineComponent({
    components: {
        LayOut,
        MultiStepForm,
    },
    data() {
        return {
            steps: [
                {
                    title: "Resident Informations",
                    step_no: 1,
                    isValid: false,
                    fields:{
                        firstName:"",
                        middleName:"",
                        lastName:""
                    },
                    rules:{
                       
                        
                    }
                },
                {
                    title: "Address",
                    step_no: 2,
                    isValid: false,
                    fields:{
                        houseNo:"",
                        province:"",
                        city:""
                    }
                },
                {
                    title: "Family Information",
                    step_no: 3,
                    isValid: false,
                },
                {
                    title: "Summary & Review",
                    step_no: 4,
                    isValid: false,
                },
            ],
        };
    },
    methods: {
        validateStep(stepIndex:number) {
                if(Object.values(this.steps[stepIndex].fields).every(field => field !== "")) {
                    this.steps[stepIndex].isValid = true;
                    (this.$refs.multiStepForm as any).nextStep();
                } else {
                    Swal.fire(
                       "Unable to proceed",
                       'Please fill in all the required fields',
                       "warning"
                    );
                }
             
          
           
        },
        submitForm() {
            console.log(this.steps);
            alert("done!");
        },
    },
});
</script>

<style lang="scss"></style>
