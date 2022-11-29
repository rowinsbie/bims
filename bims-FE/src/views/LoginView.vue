<script setup lang="ts">
import LoginForm from '../components/forms/LoginForm.vue';
</script>

<template>
    <main >
        <div id="content">
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
        </div>
        <div class="container mt-5" >
            <div class="row">
                <div class="col-lg-12 text-center" >
                    <h1>About BIMS</h1>
                    <p><b>BIMS</b> or Barangay Information Management System is a tool for barangay to provide faster, hassle-free services to the public. and also to help the barangay to manage information regarding the barangay transactions.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 text-center">
                    <font-awesome-icon class="icons pb-2" icon="fa-solid fa-calculator" />
                    <h3>Relief Budget Calculator</h3>
                    <p>It calculates the necessary budgets for the releif in a few minutes</p>
                </div>
                <div class="col-lg-4 text-center">
                    <font-awesome-icon class="icons" icon="fa-solid fa-server" />
                    <h3>Information Management</h3>
                    <p>Resident information, blotters and complaints </p>
                </div>
                <div class="col-lg-4 text-center">
                    <font-awesome-icon class="icons" icon="fa-solid fa-folder" />                    
                    <h3>E-Certificates</h3>
                    <p>Request and print your certificate online</p>
                    

                </div>
            </div>
        </div>
    </main>
</template>
<style lang="scss">
    #content {
        background: linear-gradient(rgba(8, 63, 182, 0.8),rgb(4, 23, 77)),url(../assets/images/bg.jpg);
        background-attachment: fixed;
        padding: 15rem 0rem;
        #login-left-panel {
            img {
                width: 30%;
            }
        }
    }

   
       .icons {
        font-size: 5rem;
       }
    
</style>
