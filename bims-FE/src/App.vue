<script  lang="ts">
import  { defineComponent } from "vue";
import { RouterView } from "vue-router";
import NavigationBarVue from "./components/NavigationBar.vue";
import SideBarVue from "./components/SideBar.vue";
export default defineComponent({
    components:{
        NavigationBarVue,
        SideBarVue
    },
    methods:{
        isAuthenticated() {
            if(localStorage.getItem('token') == null) {
                return false;
            }
            return true; 
        }
    }
});
</script>

<template>
    <SideBarVue v-if="isAuthenticated()" />
    <NavigationBarVue />
    <RouterView />
</template>

<style scoped></style>
