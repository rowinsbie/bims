<script setup lang="ts">
import { Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";
import FormWizard from "@/components/forms/wizard/MultiStepForm.vue";
import FormStep from "@/components/forms/wizard/FormStep.vue";
import { provide } from 'vue';

const stepDetails = [
    {
        label: "Resident Information",
    },
    {
        label: "Account Setup",
    },
      {
        label: "Sample form",
    },
];

provide('STEP_INFO',stepDetails);

// break down the validation steps into multiple schemas
const validationSchema = [
    yup.object({
        fullName: yup.string().required().label("Full Name"),
        email: yup.string().required().email().label("Email Address"),
    }),
    yup.object({
        password: yup.string().min(8).required(),
        confirmPass: yup
            .string()
            .required()
            .oneOf([yup.ref("password")], "Passwords must match"),
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
            >
                <FormStep>
                    <Field
                        name="fullName"
                        type="text"
                        class="form-control"
                        placeholder="Type your Full name"
                    />
                    <ErrorMessage name="fullName" />

                    <Field
                        name="email"
                        type="email"
                        class="form-control"
                        placeholder="Type your email"
                    />
                    <ErrorMessage name="email" />
                </FormStep>

                <FormStep>
                    <Field
                        name="password"
                        type="password"
                        placeholder="Type a strong one"
                    />
                    <ErrorMessage name="password" />

                    <Field
                        name="confirmPass"
                        type="password"
                        placeholder="Confirm your password"
                    />
                    <ErrorMessage name="confirmPass" />
                </FormStep>

                <FormStep>
                    <Field name="favoriteDrink" as="select">
                        <option>Select a drink</option>
                        <option value="coffee">Coffee</option>
                        <option value="tea">Tea</option>
                        <option value="soda">Soda</option>
                    </Field>
                    <ErrorMessage name="favoriteDrink" />
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
