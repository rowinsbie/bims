<script lang="ts">
import  { defineComponent } from 'vue';
import mobileOtherSidebarLinks from './otherItems.vue';
import UserSetting from '../UserPicture.vue';
export default defineComponent({
    components:{
        mobileOtherSidebarLinks,
        UserSetting
    },
    data() {
        return {
            mobileSidebarStatus:false
        }
    },
    methods:{
        toggleSidebar() {
            this.mobileSidebarStatus = !this.mobileSidebarStatus;
        }
    }
});
</script>
<template>
    <li class="sb-main-item  mobile-only">
        <font-awesome-icon class="sb-icon" icon="fa-solid fa-bars" />
        <a href="#" v-on:click="toggleSidebar()"   class="more-btn " >
            <span>More</span>
        </a>

        <div :class="['more-container',mobileSidebarStatus ? 'more-open' : 'more-close']">
            <div class="mb-sb-header">
                <UserSetting :isWithDropDown="false"  />
                <h2>Seiki Rowins Bie</h2>
            </div>
            <div class="mb-sb-links">
                <ul >
                    <mobileOtherSidebarLinks />
                </ul>
            </div>
            <div class="mb-sb-actions">
                <hr />
                <div class="close-sidebar">
                    <button class="btn btn-danger"  v-on:click="toggleSidebar()"><font-awesome-icon icon="fa-solid fa-circle-xmark" /> Close</button>
                </div>
            </div>
        </div>

    </li>
</template>

<style lang="scss">
@import '../../../assets/variables';
.more-close,.mobile-only {
    display: none;
}

.more-open {
    display: block;
    transition: 1s ease-in;
}

@media screen and (max-width: $xsAndsm) {
   .mobile-only {
    display: block;
   }
    .more-container {
        padding-top: 10rem;
       
        .close-sidebar {
            padding: 2rem 2rem;
            position: absolute;
            right: 0;
            bottom: 0;
        }
        .mb-sb-header {
            display: flex;
            justify-content:center;
            gap: 16px;
            align-items: center;
    
           
        }
        .mb-sb-links {
            ul {
                display: flex !important;
                flex-direction: column !important;
                justify-content: center;
                align-items: center;
                li {
    
                    a {
                       
                            color: red !important;
                       
                    }
                }
            }
        }
        position: fixed;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: white;
        width: 100%;
        border: 1px solid rgb(238, 238, 238);
        z-index: 200;
        .more {
            li {
                position: relative;
                list-style: none;
                padding: 0.6rem 0rem;
                .sb-icon {
                    min-width: 78px;
                    text-align: start;
                    line-height: 50px;
                    color: black;
                }
                a {
                    span {
                        justify-content: center;
        
                        color: black;
                    }
                }
            
            }
        }
    }
}


</style>