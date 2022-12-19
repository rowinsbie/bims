<script  lang="ts">
import  { defineComponent } from 'vue';
import UserSetting from './kits/UserSetting.vue';
import NotificationBell from '../components/NotificationBell.vue';
export default defineComponent({
    components:{
      UserSetting,
      NotificationBell
    },
    methods:{
      isAuth() {
        if(!localStorage.getItem('token'))
        {
          return false;
        }
        return true;
      }
    }
});
</script>

<template>
    <nav v-bind:class="['navbar', 'navbar-expand-lg','navbar-dark fixed-top', 'bg-nav-1']" >
        <div v-bind:class="[isAuth() ? 'container-fluid' : 'container']">
            <a class="navbar-brand" href="#">
              <img src="../assets/images/dilg_logo.png" width="40"  alt="city building">
            </a>

          <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> -->
          <div v-if="isAuth()" class="" id="navbar-right-items">           
                <NotificationBell />
                <UserSetting :width="3" :height="3" />
          </div>
        </div>
    </nav>
</template>
<style lang="scss">
@import '../assets/variables';
    .bg-nav-1 {
      box-shadow: 1px 1px 1px rgb(11, 58, 185);
        background-color: rgb(3, 81, 182);
        color: white;
    }
    nav {
      .navbar-brand{
        font-family: 'frank-black';
        font-size: 2rem;
      }       
     
      #navbar-right-items {
        display: flex;
        justify-content: space-between;
        gap:30px;
      }
  }
  // mobile design
  @media screen and (max-width: $xsAndsm),
  screen and (max-width:$xsAndsm) {
     
  }

</style>
