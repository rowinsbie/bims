<script setup lang="ts">
import { Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";
import FormWizard from "@/components/forms/wizard/MultiStepForm.vue";
import FormStep from "@/components/forms/wizard/FormStep.vue";
import { provide } from "vue";

const stepDetails = [
    {
        label: "Resident Information",
    },
    {
        label: "Contact Information",
    },
    {
        label: "Address Information",
    },
];

provide("STEP_INFO", stepDetails);

// break down the validation steps into multiple schemas
const validationSchema = [
    yup.object({
        firstName: yup.string().required().label("First Name"),
        middleName: yup.string().label("Middle Name"),
        lastName: yup.string().required().label("Last Name"),
        birthDate: yup.date().required().label("Birth Date"),
        gender: yup.string().required().label("Gender"),
    }),
    yup.object({
        contactNo: yup.number().required().label("Contact No."),
        email: yup.string().email().label("Email"),
    }),
    yup.object({
        favoriteDrink: yup
            .string()
            .required()
            .oneOf(["coffee", "tea", "soda"], "Choose a drink"),
    }),
];

/**
 * Only Called when the last step is submitted
 */
function onSubmit(formData) {
    console.log(JSON.stringify(formData, null, 2));
}
</script>
<script lang="ts">
import { defineComponent } from "vue";

import LayOut from "@/components/layout/LayOut.vue";

export default defineComponent({
    data() {
        return {};
    },
    components: {
        LayOut,
    },
});
</script>
<template>
    <LayOut>
        <div>
            <FormWizard
                :validation-schema="validationSchema"
                @submit="onSubmit"
                :stepDetail="stepDetails"
                class="container"
            >
                <FormStep class="container">
                    <div class="row">
                        <div class="col-lg-4 mt-2">
                            <label for="firstName">First Name</label>
                            <Field
                                name="firstName"
                                type="text"
                                class="form-control"
                                placeholder="First Name"
                            />
                            <ErrorMessage
                                class="text-danger"
                                name="firstName"
                            />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="middleName">Middle Name</label>
                            <Field
                                name="middleName"
                                type="text"
                                class="form-control"
                                placeholder="Middle Name"
                            />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="lastName">Last Name</label>
                            <Field
                                name="lastName"
                                type="text"
                                class="form-control"
                                placeholder="Last Name"
                            />
                            <ErrorMessage class="text-danger" name="lastName" />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="birthDate">Birth Name</label>
                            <Field
                                name="birthDate"
                                type="date"
                                class="form-control"
                            />
                            <ErrorMessage
                                class="text-danger"
                                name="birthDate"
                            />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="gender">Gender</label>
                            <Field
                                name="gender"
                                as="select"
                                class="form-control"
                            >
                                <option>Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </Field>
                            <ErrorMessage class="text-danger" name="gender" />
                        </div>
                    </div>
                </FormStep>

                <FormStep class="container">
                    <div class="row">
                        <div class="col-lg-4 mt-2">
                            <label for="contactNo">Contact No.</label>
                            <Field
                                name="contactNo"
                                type="number"
                                class="form-control"
                            />
                            <ErrorMessage
                                class="text-danger"
                                name="contactNo"
                            />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="email">Email</label>
                            <Field
                                name="email"
                                type="text"
                                class="form-control"
                            />
                            <ErrorMessage class="text-danger" name="email" />
                        </div>
                    </div>
                </FormStep>

                <FormStep class="container">
                    <div class="row">
                        <div class="col-lg-4 mt-2">
                            <label for="province">Province</label>
                            <Field
                                name="province"
                                as="select"
                                class="form-control"
                            >
                                <option>Select province</option>
                            </Field>
                            <ErrorMessage class="text-danger" name="province" />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="cityMun">City/Municipality</label>
                            <Field
                                name="cityMun"
                                as="select"
                                class="form-control"
                            >
                                <option>Select City/Municipality</option>
                            </Field>
                            <ErrorMessage class="text-danger" name="cityMun" />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="brgy">Barangay</label>
                            <Field name="brgy" as="select" class="form-control">
                                <option>Select Barangay</option>
                            </Field>
                            <ErrorMessage class="text-danger" name="brgy" />
                        </div>
                    </div>
                    <div class="row">
                     <div class="col-lg-12 mt-2">
                            <label for="address">Address</label>
                            <Field
                                name="address"
                                type="text"
                                class="form-control"
                                placeholder="Enter Room/Floor/Unit No. , Bldg. Name, House Lot/Block, Street , Subdivision"
                            />
                            <ErrorMessage class="text-danger" name="address" />
                        </div>
                    </div>
                </FormStep>
            </FormWizard>
        </div>
    </LayOut>
</template>

<style>
input,
select {
    margin: 10px 0;
    display: block;
}
</style>
