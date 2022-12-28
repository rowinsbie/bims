<script lang="ts">
import  { defineComponent } from 'vue';
export default defineComponent({
    components:{
        
    },
    data() {
        return {}
    },
    methods:{
       
    }
});
</script>

<template>
    <div id="notification ">
        <div class="dropdown">
            <div class=" notification-icon-wrapper" data-bs-toggle="dropdown" >
                <font-awesome-icon icon="fa-solid fa-bell" class="notification-bell" />
                <span class="badge rounded-pill badge-notification bg-danger total-notification">9</span>

            </div>
            <div class="notification-menu">
                <ul class="dropdown-menu dropdown-menu-left" >
                    <li class="dropdown-title">
                        <h4>Notifications</h4>
                        <hr />
                    </li>
                    <li><a class="dropdown-item" href="#">
                        <font-awesome-icon icon="fa-solid fa-circle-info" /> a new residents has been registered a new residents has been registered
                    </a></li>
                    <li><a class="dropdown-item" href="">
                        <font-awesome-icon icon="fa-solid fa-circle-info" /> a new barangay clearance request
                    </a></li>
                  </ul>
            </div>
          
          </div>
    </div>
</template>
<style lang="scss" scoped>
@import '../assets/variables';
.notification-icon-wrapper {
    position: relative;
    display: inline-block;
    padding: 2px 10px;
    .notification-bell {
        cursor: pointer;
        display: block;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        margin-top: 1rem;
        position: relative;
    }

    .total-notification {
        position: absolute;
        top: -0;
        right: 0;
        

    }
}
   

    .notification-menu {
        .dropdown-menu {
            background-color: rgb(255, 255, 255);
            padding: 1rem 1rem;
            color: rgb(10, 10, 10);
            left: auto;
            right: 0;
            .dropdown-item {
                overflow: hidden;
                text-overflow: ellipsis;
                color: rgb(0, 0, 0);

            }
            .dropdown-item:hover {
                background-color: rgb(231, 231, 231);
            }
        }
    }

  
 
    
</style>