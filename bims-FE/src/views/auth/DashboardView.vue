<script  lang="ts">
import  { defineComponent } from 'vue';
import http from '../../http/Http';
import UserPicture from '@/components/kits/CircleImage.vue';
import PostForm from '@/components/social_media/PostForm.vue';
import DefaultPicture from '../../assets/images/user/user-picture.jpg';

// data types
import type {User} from '../../types/index';

export default defineComponent({
    components:{
        UserPicture,
        PostForm
    },
    data() {
        return {
            picture:DefaultPicture,
            user:{} as User
        }
    },
    methods:{
        async getUserInfo() {
            const user = await http.get('user');
            if(user) {
                this.user = user.data;
            }
        },
        showFullName() : String {
            return this.user.first_name + " " + this.user.last_name;
        }
    },
    mounted() {
        this.getUserInfo();
    }
})
</script>
<template>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-lg-3 mt-5">
                        <UserPicture :width="10" height="10" :imgSrc="picture" />
                        <h4 class="mt-3">{{showFullName()}}</h4>
            </div>
            <div class="col-lg-6 mt-5">
              
            </div>

        </div>
    </div>
</template>
<style lang="scss">


</style>