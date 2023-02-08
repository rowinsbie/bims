<script lang="ts">
import { defineComponent } from "vue";
import mainLinks from "./kits/sidebar/mainLinks.vue";
import otherLinks from "./kits/sidebar/otherLinks.vue";
import mobileSidebarVue from "./kits/sidebar/mobileSidebar.vue";
import UserPicture from "./kits/UserPicture.vue";
export default defineComponent({
    components: {
        mainLinks,
        otherLinks,
        UserPicture,
        mobileSidebarVue,
    },
    data() {
        return {
            isOpen: false,
        };
    },
    computed: {
        isSidebarOpen() {
            return this.isOpen;
        },
    },
});
</script>
<template>
    <div class="sidebar-container container">
        <div class="sidebar">
            <div class="sb-header text-center mb-5 bg-primary">
                <img
                    src="../assets/images/dilg_logo.png"
                    width="30"
                    alt="city building"
                />

                <h6 class="text-white">
                    Barangay Information Management System
                </h6>
            </div>
            <div class="sb-body">
                <div class="user-details">
                    <div class="usr-picture mb-2">
                        <UserPicture
                            :isWithDropDown="false"
                            :width="4"
                            :height="4"
                        />
                    </div>
                    <div class="user-details text-center">
                        <span class="label-color">Hello</span>
                        <h5>Seiki Rowins Bie</h5>
                    </div>
                </div>
                <ul class="sb-links mt-5">
                    <mainLinks />
                    <otherLinks />
                    <mobileSidebarVue />
                </ul>
            </div>
        </div>
    </div>
</template>
<style lang="scss">
@import "../assets/variables";
.sidebar-container {
    position: relative;
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px !important;
        background: white;
        border-right: 1px solid rgb(245, 245, 245);
        z-index: 100;
        // header
        .sb-header {
            display: flex;
            justify-content: center;
            padding: 13px 10px;
            font-family: "frank-black";
        }
        //body
        .sb-body {
            height: 100%;
            .usr-picture {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .sb-links {
                li {
                    &.sb-main-item:nth-child(4) {
                        display: none;
                    }
                    position: relative;
                    list-style: none;
                    padding: 0.5rem 0rem;
                    .sb-icon {
                        min-width: 50px;
                        text-align: start;
                        line-height: 50px;
                        color: #6b6b6b;
                    }
                    a {
                        span {
                            color: #6b6b6b;
                            font-family: "roboto-bold";
                        }
                    }
                }
            }
        }
    }
}

@media screen and (max-width: $xsAndsm) {
    .sidebar {
        border-right: unset !important;
        position: unset;
        background-color: unset !important;
        .sb-header {
            display: none !important;
        }
        .sb-body {
            .user-details {
                display:none;
            }
            .sb-links {
                position: fixed;
                bottom: -0;
                right: 0;
                left: 0;
                border-top: 1px solid rgb(241, 241, 241);
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0rem 0rem !important;

                li {
                    &:not(.sb-main-item) {
                        display: none;
                    }

                    &.sb-main-item:nth-child(4) {
                        display: inline-block !important;
                    }

                    .sb-icon {
                        text-align: center !important;
                    }
                    a {
                        span {
                            display: flex;
                            justify-content: center;
                            font-size: 12px;
                        }
                    }
                }
            }
        }
    }
}
</style>
