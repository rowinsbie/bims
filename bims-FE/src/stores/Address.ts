import { defineStore } from "pinia";
import http from "@/http/Http";
interface Address {
    Region:BigInteger,
    Province:BigInteger,
    CityMunicipality:BigInteger,
    Barangay:BigInteger,
    Address:String
}

export const AddressAPI = defineStore('Address',{
    state: () => ({
        
            Region:[],
            Province:[],
            CityMunicipality:[],
            Barangay:[],
            Address:[]
        
    }),
    getters:{
        LIST_OF_REGIONS : (state) => {
            return state.Region;
        },
        LIST_OF_PROVINCE : (state) => {
            return state.Province;
        },
        LIST_OF_CITYMUNICIPALITY : (state) => {
            return state.CityMunicipality;
        },
        LIST_OF_BARANGAY : (state) => {
            return state.Barangay;
        }
    },
    actions:{
        async GET_REGIONS() {
            try {
                this.Region = await http.get('region-list');
                return this.Region;
            } catch(error:any) {
                return error;
            }
        },
        async GET_PROVINCE(regionID:BigInteger) {
            try {
                this.Province = await http.get(`province-list/${regionID}`);
                this.CityMunicipality = [];
                return this.Province;
            } catch(error:any) {
                return error;
            }
        },
        async GET_CITYMUNICIPALITY(provinceID:BigInteger) {
            try {
                this.CityMunicipality = await http.get(`citymunicipality-list/${provinceID}`);
                this.Barangay = []
                return this.CityMunicipality;
            } catch(error:any) {
                return error;
            }
        },
        async GET_BARANGAY(citymunID:BigInteger) {
            try {
                this.Barangay = await http.get(`barangay-list/${citymunID}`);
                return this.Barangay;
            } catch(error:any) {
                return error;
            }
        }
    }
});