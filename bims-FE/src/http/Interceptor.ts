import type { AxiosRequestConfig } from "axios";
import http from "./Http";
import HttpHandler from "./HttpHandler";

/**
 * Interceptors is a function that intercepts the request and response of the http object and handles
 * the errors.
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