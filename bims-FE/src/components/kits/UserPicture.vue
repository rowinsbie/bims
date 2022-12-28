<script lang="ts">
import  { defineComponent } from 'vue';
import UserPicture from './CircleImage.vue';
import DefaultPicture from '../../assets/images/user/user-picture.jpg';
import signOutButton from './signOutButton.vue';
export default defineComponent({
    props:[
      'isWithDropDown'
    ],
    components:{
        UserPicture,
        signOutButton
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
        
        <div :class="[isWithDropDown ? 'dropdown':'']">
          
            <div class=" " data-bs-toggle="dropdown" >
                <UserPicture :width="3" :height="3" :imgSrc="renderImg" />
            </div>
            <ul v-if="isWithDropDown" class="dropdown-menu">
              <li class="dropdown-title ">
                <h4>Account Center</h4>
                <hr />
            </li>
              <li><a class="dropdown-item" href="#">
                <font-awesome-icon icon="fa-solid fa-circle-user" /> Profile
              </a></li>
              <li><a class="dropdown-item" href="#">
                <font-awesome-icon icon="fa-solid fa-gear" /> Setting
              </a></li>
              <li>
                <signOutButton />
              </li>
            </ul>
          </div>

    </div>
</template>
<style lang="scss">
@import '../../assets/variables';

    #picture-component {
 
      cursor: pointer;
      .dropdown {
        .dropdown-menu {
          left: auto;
          right: 0;
          padding: 1rem 1rem;
          .dropdown-item {
            width: 300px ;

          }
       }
      }
}
</style>
