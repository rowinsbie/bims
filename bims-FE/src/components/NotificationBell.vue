<script lang="ts">
import  { defineComponent } from 'vue';
import DropDownVue from './kits/DropDown.vue';
export default defineComponent({
    components:{
        DropDownVue
    },
    data() {
        return {}
    },
    methods:{
        NotificationList() {
            return {
                'notification1':{
                    'icon':'fa-solid fa-envelope-dot',
                    'text':'Juan Dela Cruz',
                    'type':'link',
                    'url':'/'
                },
            }
        }
    }
});
</script>

<template>
    <div id="notification">
        <font-awesome-icon class="icons" icon="fa-solid fa-bell" />   
        <DropDownVue :title="'Notifications'" :width="25" :drop-down-list="NotificationList()" />
    </div>
</template>
<style class="scss">
#notification {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0.5rem;
    border-radius: 50%;
    cursor: pointer;
}
</style>