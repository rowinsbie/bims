<script lang="ts">
import  { defineComponent } from 'vue';
import DropDownVue from './DropDown.vue';
export default defineComponent({
    props:[
        'width',
        'height'
    ],
    components:{
        DropDownVue
    },
    data() {
        return {

        }
    },
    methods:{
        dropDownList() {
            return {
                'Profile':{
                    'icon':'fa-solid fa-circle-user',
                    'text':'Profile',
                    'type':'link',
                    'url':'/profile'
                },
                'Sign Out':{
                    'icon':'fa-solid fa-right-from-bracket',
                    'text':'Sign Out',
                    'type':'button'
                }
            }
        }
    },
    computed: {
        imgWidth() { 
            return "width:"+this.width+"rem";
        },
        imgHeight() {
            return "height:"+this.height+"rem";
        }
    }
});
</script>
<template>
    <div id="picture-component" >
        <div class="circle">
            <img class="user-picture" :style="[imgWidth,imgHeight]" src="../../assets/images/user/user-picture.jpg" />
        </div>
        <div class="m-2">
           <DropDownVue :title="'User Information'" :width="10" :drop-down-list="dropDownList()" />
        </div>
    </div>
</template>
<style lang="scss">
    #picture-component {
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        .circle {
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 3px solid rgb(238, 90, 4);
        }
       
}
</style>