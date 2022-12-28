<script lang="ts">
import { defineComponent } from "vue";
import mainLinks from "./kits/sidebar/mainLinks.vue";
import otherLinks from "./kits/sidebar/otherLinks.vue";
import mobileSidebarVue from "./kits/sidebar/mobileSidebar.vue";
import UserSetting from "./kits/UserPicture.vue";
export default defineComponent({
    components: {
        mainLinks,
        otherLinks,
        UserSetting,
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
            <div class="sb-header">
                <h3>BIMS</h3>
                <hr />
            </div>
            <div class="sb-body">
                <ul class="sb-links">
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
        width: 250px;
        background: rgb(255, 255, 255);
        border-right: 1px solid rgb(245, 245, 245);
        z-index: 100;
        // header
        .sb-header {
            border-bottom: 1px solid rgb(230, 230, 230);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px 0px;
        }
        //body
        .sb-body {
            height: 100%;

            .sb-links {
                li {
                    &.sb-main-item:nth-child(4) {
                        display: none;
                    }

                    position: relative;
                    list-style: none;
                    padding: 1rem 0rem;
                    .sb-icon {
                        min-width: 78px;
                        text-align: start;
                        line-height: 50px;
                        color: black;
                    }
                    a {
                        span {
                            color: black;
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
