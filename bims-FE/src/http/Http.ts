import axios from 'axios';
const http = axios.create({
    baseURL:import.meta.env.VITE_API_URL,
    withCredentials:true,
    headers:{
        Accept: "application/json",
        Authorization:'Bearer ' + localStorage.getItem('token')
     }
});

export default http;