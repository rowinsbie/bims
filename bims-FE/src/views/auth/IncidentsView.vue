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
                            <template v-slot:step0>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name">First Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your first name"
                                        />
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="name">Middle Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your middle name"
                                        />
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="name">Last Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your last name"
                                        />
                                    </div>
                                </div>
                            </template>

                            <template v-slot:step1>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name"
                                            >House No. & Lot</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your House & lot no."
                                        />
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="name">Province</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your Province"
                                        />
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="name">City</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your City"
                                        />
                                    </div>
                                </div>
                            </template>

                            <template v-slot:step2>
                                <h1>step3</h1>
                            </template>
                            <template v-slot:step3>
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
                    isSkipable: false,
                },
                {
                    title: "Address",
                    step_no: 2,
                    isValid: false,
                    isSkipable: false,
                },
                {
                    title: "Family Information",
                    step_no: 3,
                    isValid: false,
                    isSkipable: false,
                },
                {
                    title: "Summary & Review",
                    step_no: 4,
                    isValid: false,
                    isSkipable: false,
                },
            ],
        };
    },
    methods: {
        validateStep(stepIndex:number) {
            this.steps[stepIndex].isValid = true;
            (this.$refs.multiStepForm as any).nextStep();
        },
        submitForm() {
            alert("done!");
        },
    },
});
</script>

<style lang="scss"></style>
