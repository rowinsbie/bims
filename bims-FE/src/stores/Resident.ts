import { defineStore } from "pinia";
import http from "@/http/Http";
import Swal from 'sweetalert2'

export const ResidentAPI = defineStore('Resident',{
    state: () => ({
        residentData:[]
    }),
    actions:{
      /**
       * It sends a post request to the server and returns a response.
       * </code>
       * @param {object} data - object
       * @returns The response from the server.
       */
        async REGISTER_RESIDENT(data:object) {
            try {
                this.residentData = await http.post('resident-management',data);
                Swal.fire({
                    title:"Registration's Successful",
                    text:"The new resident has been registered successfully",
                    icon:"success"
                }).then(res => {
                    location.reload();
                });
            } catch(error:any) {
                return error;
            }
        }
    }
});