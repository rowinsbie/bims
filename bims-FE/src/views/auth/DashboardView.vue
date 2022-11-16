<script  lang="ts">
import  { defineComponent } from 'vue';
import http from '../../http/Http';
export default defineComponent({
    data() {
        return {
            userData:{}
        }
    },
    methods:{
        async getUserInfo() {
            const user = await http.get('user');
            if(user) {
                this.userData = user.data;
            }
        },
    },
    mounted() {
        this.getUserInfo();
    }
})
</script>
<template>
<h1>Welcome {{this.userData.first_name}}</h1>
</template>
<style lang="scss">
</style>