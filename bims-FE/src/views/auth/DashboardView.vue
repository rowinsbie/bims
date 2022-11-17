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
</template>
<style lang="scss">
</style>