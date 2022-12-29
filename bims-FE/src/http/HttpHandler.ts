import Swal from 'sweetalert2'
import { useAuthManagement } from '@/stores/Auth';

/**
 * This method will translate the http code messages
 * In a form where users would have better understanding on what is going on while using the application
 * @param http_code 
 * @returns SweetAlert with message for the user
 */
export default function HttpHandler(http_code:number) {
    let HttpTitle:string = "Network Error";
    let HttpMessage:string = "Please make sure you're connected to the internet.";
    let HttpMessageType:any = "error";

    if(http_code !== 200 && http_code !== 422) {
        switch(http_code) {
            case 401:
                HttpTitle = "401: Unauthorized";
                HttpMessage = "You're not authorized to access this page, you might want to try to log-in again to gain authorization.";
                HttpMessageType = "info";
                break;

            case 503:
                HttpTitle = "503: Service Temporarily Unavailable";
                HttpMessage = "Please try again later";
                HttpMessageType = "warning";
                break;
    
            case 404:
                HttpTitle = "404: Service not found";
                HttpMessage = "The resource requested could not be found on the server.";
                HttpMessageType = "info";
                break;

            case 500:
                HttpTitle = "505: Internal Server Error";
                HttpMessage = "There's something wrong in the server side, Please try again later.";
                HttpMessageType = "error";
                break;
                
            case 419:
                HttpTitle = "419: Authentication has expired";
                HttpMessage = "Your last session has expired, Please login again.";
                HttpMessageType = "info";
                break;          
        }
    
    
        Swal.fire(
            HttpTitle,
            HttpMessage,
            HttpMessageType
        ).then((res) => {
            if(res && http_code == 401 || http_code == 419) {
                useAuthManagement().SignOut();
            }
        });;
    }
   

}