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
            <div class="text-white notification-icon-wrapper" data-bs-toggle="dropdown" >
                <font-awesome-icon icon="fa-solid fa-bell" class="notification-bell" />
                <span class="badge rounded-pill badge-notification bg-danger">9</span>

            </div>
            <div class="notification-menu">
                <ul class="dropdown-menu " >
                    <li class="dropdown-title">
                        <h4>Notifications</h4>
                    </li>
                    <li><a class="dropdown-item" href="#">
                        <font-awesome-icon icon="fa-solid fa-circle-info" /> a new residents has been registered a new residents has been registered
                    </a></li>
                    <li><a class="dropdown-item" href="#">
                        <font-awesome-icon icon="fa-solid fa-circle-info" /> a new barangay clearance request
                    </a></li>
                  </ul>
            </div>
          
          </div>
    </div>
</template>
<style lang="scss" scoped>
    .notification-bell {
        cursor: pointer;
        display: block;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        margin-top: 1rem;
        position: relative;
    }

    .notification-menu {
        .dropdown-menu {
            background-color: rgb(3, 81, 182);
            padding: 1rem 1rem;
            color: white;
            .dropdown-item {
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 300px;
                color: white;

            }
            .dropdown-item:hover {
                background-color: rgb(26, 106, 211);
            }
        }
    }

   
 
    
</style>