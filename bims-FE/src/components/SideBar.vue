<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({});
</script>
<template>
    <div class="sidebar-container container">
        <div class="sidebar">
            <div class="sb-header">
            
                <h3>BIMS</h3>
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
        padding: 10px 14px;
        background:rgb(255, 255, 255);
        border-right: 1px solid rgb(245, 245, 245);
        // header
        .sb-header {
            border-bottom: 1px solid rgb(230, 230, 230);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0px;
          
        }
        //body
       
    }
}

@media screen and (max-width: $xsAndsm) {
    .sidebar {
        border-right: unset !important;
        position: unset;
        background-color: unset !important;

    }
    .sb-header {
        display: none !important;
    }
    .sb-body {
        position: fixed;
        left: 0;
        right: 0;
        bottom: 0;
        .sb-item-group {
            border-top: 1px solid rgb(226, 226, 226);
            display: flex;
            justify-content: space-around;
            align-items: center;
            overflow: scroll;
            .sb-link {
                span {
                    display: none;
                }
            }
        }
    }
}
</style>
