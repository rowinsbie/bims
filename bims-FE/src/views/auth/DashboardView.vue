<script  lang="ts">
import  { defineComponent } from 'vue';
import http from '../../http/Http';
import UserPicture from '@/components/kits/CircleImage.vue';
import PostForm from '@/components/social_media/PostForm.vue';
import DefaultPicture from '../../assets/images/user/user-picture.jpg';
export default defineComponent({
    components:{
        UserPicture,
        PostForm
    },
    data() {
        return {
            picture:DefaultPicture,
            userData:{
                first_name:null,
                last_name:null
            }
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
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-lg-3 mt-5">
                        <UserPicture :width="10" height="10" :imgSrc="picture" />
                        <h4 class="mt-3">{{userData.first_name}} {{userData.last_name}}</h4>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card mt-3 card-with-radius">
                    <div class="card-body">
                      <PostForm />
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<style lang="scss">


</style>