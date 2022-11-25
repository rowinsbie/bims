<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    props:['dropDownList','width','title'],
    data() {
        return {}
    },
    methods:{
        openDropDown() {
            const dropList = document.getElementById('drop-list');
            dropList.style.display = "block";
        },
        closeDropDown() {
            const dropList = document.getElementById('drop-list');
            dropList.style.display = "none";
        }
    },
    computed:{
        dropDownWidth() {
            return "width:"+this.width+"rem;";
        }
    }
});
</script>
<template>
   <div class="drop-down"  v-on:click="openDropDown()" v-on:mouseleave="closeDropDown()">
    <font-awesome-icon class="drop-down-btn" icon="fa-solid fa-caret-down"  />
    <ul class="drop-list" :style="[dropDownWidth]" id="drop-list">
        <li>
            <h3>{{this.title}}</h3>
        </li>
        <li v-for="(value) in dropDownList" :key="value.index">
           <div v-if="value.type == 'link'">
            <RouterLink to="/" class="text-dark">
                <font-awesome-icon :icon="value.icon" /> {{value.text}} 
               </RouterLink>
           </div>
           <button v-if="value.type == 'button'" type="button" class="btn btn-primary">{{value.text}}</button>
        </li>
    </ul>
   </div>
</template>
<style lang="scss">
.drop-list {
    border: 1px solid rgb(241, 241, 241);
    position: absolute;
    background-color: white;
    padding: 1rem 1rem;
    display: none;
    left: 74rem;
    max-width: 100%;
    li {
        padding: 0.2rem 0rem;
    }
}
.drop-down-btn {
    cursor: pointer;
}
</style>