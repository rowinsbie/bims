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
        isPWD: yup.boolean().required("Tell us, is this a person with disabilities?"),
        disabilities: yup.string().when('isPWD',{
            is:true,
            then:yup.string().required("Please select the disabilities").label('Disabilities')
        })

    }),
    yup.object({
        contactNo: yup.number().required().label("Contact No."),
        email: yup.string().email().label("Email"),
    }),
    yup.object({
        region: yup.string().required().label("Region").nullable(),
        province: yup.string().required().label("Region").nullable(),
        cityMun: yup.string().required().label("City/Municipality").nullable(),
        brgy: yup.string().required().label("Barangay").nullable(),
        address: yup.string().required().label("Address").nullable(),
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
import { AddressAPI } from "@/stores/Address";

export default defineComponent({
    data() {
        return {
            Address: AddressAPI(),
            formData: {
                isPWD:false,
                Region: null,
                Province: null,
                CityMunicipality: null,
            },
        };
    },
    components: {
        LayOut,
    },
    mounted() {
        this.Address.GET_REGIONS();
    },
    methods: {
        getProvince() {
            if (this.formData.Region !== null) {
                this.Address.GET_PROVINCE(this.formData.Region);
            }
        },
        getMunicipality() {
            this.Address.GET_CITYMUNICIPALITY(this.formData.Province);
        },
        getBarangay() {
            this.Address.GET_BARANGAY(this.formData.CityMunicipality);
        },
       
    },
    computed: {
        listTheRegions() {
            return this.Address.LIST_OF_REGIONS;
        },
        listOfProvince() {
            return this.Address.LIST_OF_PROVINCE;
        },
        listOfCityMunicipality() {
            return this.Address.LIST_OF_CITYMUNICIPALITY;
        },
        listOfBarangay() {
            return this.Address.LIST_OF_BARANGAY;
        },
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
                            <label for="middleName"
                                >Middle Name (Optional)</label
                            >
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
                        <div
                            class="col-lg-4 mt-2  pt-2 pb-2 pl-4 pr-4 text-center"
                        >
                        
                            <div class="flex">
                              <p>is PWD (person with disability) ?</p>
                                <div class="flex">
                                    <Field
                                        name="isPWD"
                                        type="radio"
                                        :value="true"
                                        v-model="formData.isPWD"
                                    />
                                    <span>Yes</span>
                                </div>

                                <div class="flex">
                                    <Field
                                        name="isPWD"
                                        type="radio"
                                        :value="false"
                                        v-model="formData.isPWD"
                                    />
                                    <span>No</span>
                                </div>
                            </div>
                             <div v-if="formData.isPWD">
                                 <Field
                                name="disabilities"
                                as="select"
                                class="form-control"
                            >
                                <option>Select disabilities</option>
                                <option value="Deaf">Deaf</option>
                                <option value="Blind">Blind</option>
                            </Field>
                                                         <ErrorMessage class="text-danger" name="disabilities" />

                             </div>
                                                         <ErrorMessage class="text-danger" name="isPWD" />

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
                            <label for="email">Email (Optional)</label>
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
                            <label for="region">Region</label>
                            <Field
                                name="region"
                                as="select"
                                class="form-control"
                                v-model="formData.Region"
                                @change="getProvince()"
                            >
                                <option>Select Region</option>
                                <option
                                    v-for="(
                                        value, index
                                    ) in listTheRegions.data"
                                    :key="index"
                                    :value="value.regCode"
                                >
                                    {{ value.regDesc }}
                                </option>
                            </Field>
                            <ErrorMessage class="text-danger" name="region" />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="province">Province</label>
                            <Field
                                name="province"
                                as="select"
                                class="form-control"
                                v-model="formData.Province"
                                @change="getMunicipality()"
                            >
                                <option>Select Province</option>
                                <option
                                    v-if="listOfProvince.data"
                                    v-for="(
                                        value, index
                                    ) in listOfProvince.data"
                                    :key="index"
                                    :value="value.provCode"
                                >
                                    {{ value.provDesc }}
                                </option>
                            </Field>
                            <ErrorMessage class="text-danger" name="province" />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="cityMun">City/Municipality</label>
                            <Field
                                name="cityMun"
                                as="select"
                                class="form-control"
                                v-model="formData.CityMunicipality"
                                @change="getBarangay()"
                            >
                                <option>Select City/Municipality</option>
                                <option
                                    v-if="listOfCityMunicipality.data"
                                    v-for="(
                                        value, index
                                    ) in listOfCityMunicipality.data"
                                    :key="index"
                                    :value="value.citymunCode"
                                >
                                    {{ value.citymunDesc }}
                                </option>
                            </Field>
                            <ErrorMessage class="text-danger" name="cityMun" />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="brgy">Barangay</label>
                            <Field name="brgy" as="select" class="form-control">
                                <option>Select Barangay</option>
                                <option
                                    v-if="listOfBarangay.data"
                                    v-for="(
                                        value, index
                                    ) in listOfBarangay.data"
                                    :key="index"
                                    :value="value.brgyCode"
                                >
                                    {{ value.brgyDesc }}
                                </option>
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
