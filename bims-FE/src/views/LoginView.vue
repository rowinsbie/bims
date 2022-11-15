<script setup lang="ts">
import LoginForm from '../components/forms/LoginForm.vue';
</script>

<template>
    <main>
       <div class="container">
            <div class="row" id="content">
                <div class="col-lg-8 text-center" id="login-left-panel">
                    <img src="../assets/images/illustrators/city-building.png" alt="city building">
                    <h3>Barangay Information Management System</h3>
                </div>
                <div class="col-lg-4">
                   <LoginForm />
                </div>
            </div>
       </div>
    </main>
</template>
<style lang="scss">
    #content {
        padding: 10rem 0rem;
        #login-left-panel {
            img {
                width: 50%;
            }
        }
    }
</style>
