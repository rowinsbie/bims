<script lang="ts">
import  { defineComponent } from 'vue';
import UserPicture from '../kits/CircleImage.vue';
import DefaultPicture from '../../assets/images/user/user-picture.jpg';
export default defineComponent({
   
    components:{
        UserPicture
    },
    data() {
        return {
            renderImg: DefaultPicture

        }
    },
    methods:{
      
    },
    
});
</script>
<template>
    <div id="picture-component" >
        
        <div class="dropdown ">
            <div class=" " data-bs-toggle="dropdown" >
                <UserPicture :width="3" :height="3" :imgSrc="renderImg" />
            </div>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">
                <font-awesome-icon icon="fa-solid fa-circle-user" /> Profile
              </a></li>
              <li><a class="dropdown-item" href="#">
                <font-awesome-icon icon="fa-solid fa-gear" /> Setting
              </a></li>
              <li><a class="dropdown-item" href="#">
                <font-awesome-icon icon="fa-solid fa-right-from-bracket" /> Sign Out
              </a></li>
            </ul>
          </div>

    </div>
</template>
<style lang="scss">
    #picture-component {
 
        cursor: pointer;
        .circle {
            border-radius: 50%;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            max-width: fit-content;
            border: 3px solid rgb(238, 90, 4);
        }
       .dropdown-menu {
        left: auto;
        right: 0;
       }
}
</style>