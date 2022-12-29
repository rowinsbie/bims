import type { AxiosRequestConfig } from "axios";
import http from "./Http";
import HttpHandler from "./HttpHandler";
/**
 * This method will Intercept all the http request throughout the application,
 * and put the intercepted http code as a parameter for the method HttpHandler
 */
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
        // http handler
        if(error.response && error.response.status) {
            HttpHandler(error.response.status);
        }
        return Promise.reject(error);
    });
}