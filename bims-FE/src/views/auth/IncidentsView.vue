<script setup lang="ts">
import { Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";
import FormWizard from "@/components/forms/wizard/MultiStepForm.vue";
import FormStep from "@/components/forms/wizard/FormStep.vue";
import { provide } from "vue";
import { ResidentAPI } from "@/stores/Resident";

const ResidentEndpoint = ResidentAPI();

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
        first_name: yup.string().required().label("First Name").nullable(),
        middle_name: yup.string().label("Middle Name").nullable(),
        last_name: yup.string().required().label("Last Name").nullable(),
        birthdate: yup.date().required().label("Birth Date").nullable(),
        gender: yup.string().required().label("Gender").nullable(),
        isPWD: yup
            .boolean()
            .required("Tell us, is this a person with disabilities?"),
        disabilities: yup.string().when("isPWD", {
            is: true,
            then: yup
                .string()
                .required("Please select the disabilities")
                .label("Disabilities").nullable(),
        }),
    }),
    yup.object({
        contact_no: yup
            .string()
            .required()
            .matches(new RegExp("^[0-9]{11,11}$"),"Please enter a valid mobile number")
            .label("Contact No.").nullable(),
        email: yup.string().email().label("Email").nullable(),
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
    ResidentEndpoint.REGISTER_RESIDENT(formData);
    console.table(JSON.stringify(formData, null, 2));
}
</script>

<script lang="ts">
import { defineComponent } from "vue";
import LayOut from "@/components/layout/LayOut.vue";
import { AddressAPI } from "@/stores/Address";
import { DisabilitiesAPI } from "@/stores/Disabilities";

export default defineComponent({
    data() {
        return {
            Address: AddressAPI(),
            Disabilities: DisabilitiesAPI(),
            formData: {
                firstName: null,
                middleName: null,
                lastName: null,
                gender: null,
                birthDate: null,
                isPWD: false,
                disabilities:null,
                contactNo: null,
                email: null,
                addressTo:{
                    Region: null,
                    Province: null,
                    CityMunicipality: null,
                    barangay:null,
                    address:null
                }
            },
        };
    },
    components: {
        LayOut,
    },
    mounted() {
        this.Address.GET_REGIONS();
        this.Disabilities.SHOW_LIST();
    },
    methods: {
        getProvince() {
            if (this.formData.addressTo.Region !== null) {
                this.Address.GET_PROVINCE(this.formData.addressTo.Region);
            }
        },
        getMunicipality() {
            this.Address.GET_CITYMUNICIPALITY(this.formData.addressTo.Province);
        },
        getBarangay() {
            this.Address.GET_BARANGAY(this.formData.addressTo.CityMunicipality);
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
        listOfDisabilities() {
            return this.Disabilities.GET_LIST;
        },
    },
});
</script>
<template>
    <LayOut>
        <div class="card">
           <div class="card-body">
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
                                name="first_name"
                                type="text"
                                class="form-control"
                                placeholder="First Name"
                                v-model="formData.firstName"
                            />
                            <ErrorMessage
                                class="text-danger"
                                name="first_name"
                            />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="middleName"
                                >Middle Name (Optional)</label
                            >
                            <Field
                                name="middle_name"
                                type="text"
                                class="form-control"
                                placeholder="Middle Name"
                                 v-model="formData.middleName"
                            />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="lastName">Last Name</label>
                            <Field
                                name="last_name"
                                type="text"
                                class="form-control"
                                placeholder="Last Name"
                                 v-model="formData.lastName"
                            />
                            <ErrorMessage class="text-danger" name="last_name" />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="birthDate">Birth Date</label>
                            <Field
                                name="birthdate"
                                type="date"
                                class="form-control"
                                 v-model="formData.birthDate"
                            />
                            <ErrorMessage
                                class="text-danger"
                                name="birthdate"
                            />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="gender">Gender</label>
                            <Field
                                name="gender"
                                as="select"
                                class="form-control"
                                 v-model="formData.gender"
                            >
                                <option>Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </Field>
                            <ErrorMessage class="text-danger" name="gender" />
                        </div>
                        <div
                            class="col-lg-4 mt-2 pt-2 pb-2 pl-4 pr-4 text-center"
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
                                     v-model="formData.disabilities"
                                >
                                    <option>Select disabilities</option>
                                    <option
                                        v-for="(
                                            value, index
                                        ) in listOfDisabilities.data"
                                        :key="index"
                                        :value="value.id"
                                    >
                                        {{ value.disabilityDesc }}
                                    </option>
                                </Field>
                                <ErrorMessage
                                    class="text-danger"
                                    name="disabilities"
                                />
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
                                name="contact_no"
                                type="text"
                                class="form-control"
                                 v-model="formData.contactNo"
                            />
                            <ErrorMessage
                                class="text-danger"
                                name="contact_no"
                            />
                        </div>

                        <div class="col-lg-4 mt-2">
                            <label for="email">Email (Optional)</label>
                            <Field
                                name="email"
                                type="text"
                                class="form-control"
                                 v-model="formData.email"
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
                                v-model="formData.addressTo.Region"
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
                                v-model="formData.addressTo.Province"
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
                                v-model="formData.addressTo.CityMunicipality"
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
                            <Field name="brgy" as="select" class="form-control"
                             v-model="formData.addressTo.barangay"
                            >
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
                                v-model="formData.addressTo.address"
                            />
                            <ErrorMessage class="text-danger" name="address" />
                        </div>
                    </div>
                </FormStep>
            </FormWizard>
           </div>
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
