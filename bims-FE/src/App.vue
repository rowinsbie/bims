<script setup lang="ts">
import { RouterView } from "vue-router";
import NavigationBarVue from "./components/NavigationBar.vue";
import SideBarVue from "./components/SideBar.vue";
</script>

<template>
    <SideBarVue />
    <NavigationBarVue />
    <RouterView />
</template>

<style scoped></style>
