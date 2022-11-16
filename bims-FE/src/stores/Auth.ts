import { defineStore } from "pinia";
import http from '../http/Http';

interface UserCredentials {
    resident_number:string,
    password:string
}

interface APIResponse {
    response?:Object,
    data?:Object,
    status?:BigInteger
}

export const useAuthManagement = defineStore('Auth',{
    state: () => ({
        userData: {
            data:{
                token:""
            }
        }
    }),
    actions: {
        async AuthenticateUser(credentials:UserCredentials) {
            try {
                this.userData = await http.post('authenticate',credentials);
                return this.userData;
            } catch(error:any) {
               return error;
            }
        }
    }
});