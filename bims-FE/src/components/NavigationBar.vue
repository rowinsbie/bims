<script  lang="ts">
import  { defineComponent } from 'vue';
import UserSetting from './kits/UserSetting.vue';
import NotificationBell from '../components/NotificationBell.vue';
export default defineComponent({
    components:{
      UserSetting,
      NotificationBell
    }
});
</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container">
            <a class="navbar-brand" href="#">BIMS</a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
           
              <li class="nav-item">
                <NotificationBell />
              </li>
              <li class="nav-item">
                <UserSetting :width="3" :height="3" />
             
              </li>
            </ul>
          </div>
        </div>
    </nav>
</template>
<style lang="scss">
    nav {
        box-shadow: 1px 1px 1px rgb(238, 238, 238);
        background-color: rgb(3, 81, 182);
        .navbar-brand{
          font-family: 'frank-black';
          font-size: 2rem;
        }

        .nav-item {
          padding-right: 1rem;
          .nav-link {
            .icons {
              font-size: 1.3rem;
            }
          }
        }
    }
</style>
