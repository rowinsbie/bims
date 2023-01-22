import { defineStore } from "pinia";
import http from "@/http/Http";
export const DisabilitiesAPI = defineStore('Disabilities',{
    state : () => ({
        List:[]
    }),
    getters:{
        GET_LIST : (state) => {
            return state.List;
        }
    },
    actions:{
        async SHOW_LIST() {
            try {
                this.List = await http.get('disabilities')
                return this.List;
            } catch (error:any) {
                return error;
            }
        }
    }
});