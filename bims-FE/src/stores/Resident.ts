import { defineStore } from "pinia";
import http from "@/http/Http";

export const ResidentAPI = defineStore('Resident',{
    state: () => ({
        residentData:[]
    }),
    actions:{
        async REGISTER_RESIDENT(data:object) {
            try {
                this.residentData = await http.post('',data);
            } catch(error:any) {
                return error;
            }
        }
    }
});