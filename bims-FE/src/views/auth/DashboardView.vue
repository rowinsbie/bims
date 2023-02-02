<script  lang="ts">
import  { defineComponent } from 'vue';
import http from '../../http/Http';
import UserPicture from '@/components/kits/CircleImage.vue';
import DefaultPicture from '../../assets/images/user/user-picture.jpg';
import cardStatistic from '@/components/cards/cardStatistic.vue';
import LayOut from "@/components/layout/LayOut.vue";
// data types
import type {User} from '../../types/index';

export default defineComponent({
    components:{
        UserPicture,
        LayOut,
        cardStatistic
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
    <LayOut>

    <div class="container">
        <div class="row ">
            <div class="col-lg-3 ">
                <cardStatistic />
            </div>

        </div>
    </div>
    </LayOut>
</template>
<style lang="scss">


</style>