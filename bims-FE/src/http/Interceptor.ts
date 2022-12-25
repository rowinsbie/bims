import type { AxiosRequestConfig } from "axios";
import http from "./Http";
import { useAuthManagement } from '@/stores/Auth';
export default function Interceptors() {
    http.interceptors.request.use((config:AxiosRequestConfig) => {
        return config;
    },(error) => {
        console.log(error.response)
        return Promise.reject(error);
    });
    
    http.interceptors.response.use((response) => {
       
        return response;
    },(error) => {
        if(error.response && error.response.status == 401) {
            useAuthManagement().SignOut();  
        }
        return Promise.reject(error);
    });
}