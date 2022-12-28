<script lang="ts">
import { defineComponent } from "vue";
import UserSetting from "./kits/UserPicture.vue";
import NotificationBell from "../components/NotificationBell.vue";
export default defineComponent({
    components: {
        UserSetting,
        NotificationBell,
    },
    methods: {
        isAuth() {
            if (!localStorage.getItem("token")) {
                return false;
            }
            return true;
        },
    },
});
</script>

<template>
    <div class="navigation-bar">
        <nav
            v-bind:class="[
                'navbar',
                'navbar-expand-lg',
                'navbar-dark',
                !isAuth() ? 'fixed-top bg-nav-1' : 'border',
            ]"
        >
            <div v-bind:class="[!isAuth() ? 'container' : 'container-fluid']">
                <a class="navbar-brand" href="#">
                    <img
                        src="../assets/images/dilg_logo.png"
                        width="40"
                        alt="city building"
                    />
                </a>
                <div v-if="isAuth()" class="" id="navbar-right-items">
                    <NotificationBell />
                    <UserSetting :isWithDropDown="true" :width="3" :height="3" />
                </div>
            </div>
        </nav>
    </div>
</template>
<style lang="scss">
@import "../assets/variables";
.bg-nav-1 {
    box-shadow: 1px 1px 1px rgb(11, 58, 185);
    background-color: rgb(3, 81, 182);
    color: white;
}
.navigation-bar {
  position: fixed; // caused of bug in dropdown
  right: 0;
  top: 0;
    width: calc(100% - 250px);
    .navbar {
        .navbar-brand {
            font-family: "frank-black";
            font-size: 2rem;
        }

        #navbar-right-items {
            display: flex;
            justify-content: space-between;
            gap: 30px;
        }
    }
}
// mobile design
@media screen and (max-width: $xsAndsm), screen and (max-width: $xsAndsm) {
  .navigation-bar {
    position: unset !important;
    width: 100% !important;
  }
}
</style>
