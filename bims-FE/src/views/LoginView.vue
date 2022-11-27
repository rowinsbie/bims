<script setup lang="ts">
import LoginForm from '../components/forms/LoginForm.vue';
</script>

<template>
    <main id="content">
       <div class="container"  >
            <div class="row">
                <div class="col-lg-8 text-center text-white" id="login-left-panel">
                    <img src="../assets/images/dilg_logo.png"  alt="city building">
                    <h1>Barangay Information </h1>
                    <h1>Management System</h1>
                </div>
                <div class="col-lg-4 ">
                  <div class="card ">
                    <div class="card-body">
                        <LoginForm />
                    </div>
                  </div>
                </div>
            </div>
       </div>
    </main>
</template>
<style lang="scss">
    #content {
        background: linear-gradient(rgba(8, 63, 182, 0.8),rgb(4, 23, 77)),url(../assets/images/bg.jpg);
        background-attachment: fixed;
        padding: 10rem 0rem;
        #login-left-panel {
            img {
                width: 30%;
            }
        }
    }
</style>
