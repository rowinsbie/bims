<script lang="ts">
import { defineComponent } from "vue";
export default defineComponent({
    props:[
        'isOpen'
    ],
    components:{
    },
    data() {
        return {
           
        }
    },
    methods:{
     
    }
});
</script>
<template>
    <li class="sb-main-item">
        <font-awesome-icon
            class="sb-icon"
            icon="fa-solid fa-table-columns"
        />
        <a href="">
            <span>Dashboard</span>
        </a>
    </li>
    <li class="sb-main-item">
        <font-awesome-icon
            class="sb-icon"
            icon="fa-solid fa-handshake-angle"
        />
        <a href="">
            <span>Aid </span>
        </a>
    </li>
    <li class="sb-main-item">
        <font-awesome-icon
            class="sb-icon"
            icon="fa-solid fa-users"
        />
        <a href="">
            <span>Residents</span>
        </a>
    </li>
   
</template>
<style lang="scss">

</style>