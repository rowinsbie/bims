<script lang="ts">
import  { defineComponent } from 'vue';
import { useAuthManagement } from '@/stores/Auth';
import { RouterLink } from 'vue-router';
 export default defineComponent({
    components:{
    },
    methods:{
        signOut()
        {
            useAuthManagement().SignOut();
        }
    }
 });
</script>
<template>
    <RouterLink class="dropdown-item" to="#" v-on:click.native="signOut()">
        <font-awesome-icon icon="fa-solid fa-right-from-bracket" /> Sign Out
      </RouterLink>
</template>