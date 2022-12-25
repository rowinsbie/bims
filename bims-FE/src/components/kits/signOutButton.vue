<script lang="ts">
import  { defineComponent } from 'vue';
import { useAuthManagement } from '@/stores/Auth';

 export default defineComponent({
    methods:{
        signOut()
        {
           useAuthManagement().SignOut();
        }
    }
 });
</script>
<template>
    <a class="dropdown-item" href="#" v-on:click="signOut()">
        <font-awesome-icon icon="fa-solid fa-right-from-bracket" /> Sign Out
      </a>
</template>