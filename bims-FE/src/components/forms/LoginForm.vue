<script  lang="ts">
import { useAuthManagement } from '@/stores/Auth';
import {defineComponent} from 'vue';
import http from '../../http/Http';
export default defineComponent({
    
    data() {
        return {
            credentials:{
                resident_number:"",
                password:""
            },
            AuthResult:{
                httpCode:null,
                httpMessage:""
            }
        }
    },
    methods:{
        async Login(){
            const Login = useAuthManagement();
            const result = await Login.AuthenticateUser(this.credentials);
            if(result.status && result.status == 200) {
                localStorage.setItem('token',result.data.token);
                location.href = "/dashboard";
            } else {
                const response = result.response;
                this.AuthResult = {
                    httpCode:response.status,
                    httpMessage:response.data.message
                }
            }

                
        }
    }
    
});
</script>
<template>
   <div class="login-form">
        <h3>Sign to your account</h3>
        <form method="POST">
            <div class="form-group mt-3">
                <label for="username">Username</label>
                <input v-model="credentials.resident_number" type="text" class="form-control" placeholder="Enter your username">
            </div>
            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input v-model="credentials.password" type="password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="form-group mt-3">
                <button v-on:click="Login()" type="button" class="btn btn-primary form-control">Sign In</button>
            </div>
            <div v-if="AuthResult.httpCode == 422" class="form-group mt-3 text-center failed-message">
                <font-awesome-icon class="text-white" icon="fa-solid fa-circle-exclamation" />
                <span class="badge">{{AuthResult.httpMessage}}</span>
            </div>
        </form>
   </div>
</template>
<style lang="scss" >
.login-form {
    padding: 3rem 1rem;

    .failed-message {
        padding: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgb(196, 17, 47);
        position: sticky;
        padding: 0rem 0rem !important;
        left: 0;
        bottom: 0;
        font-size: 20px;
        border-radius: 20px 20px 20px 20px;
        .badge {
            padding: 1rem 0.5rem;
        }
    }
}
</style>