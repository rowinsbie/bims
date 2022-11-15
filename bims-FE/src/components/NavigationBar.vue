<script setup lang="ts">
    
</script>

<template>
    <nav>
        <h1>nav</h1>
        <ul class="nav-group">
            <li>
                <a href="">Home</a>
            </li>
            <li>
                <a href="">About</a>
            </li>
            <li>
                <a href="">Officials</a>
            </li>
        </ul>
    </nav>
</template>
<style lang="scss">
    nav {
        display: flex;
        justify-content: space-around;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        color: white;
        background-color: black;
        padding: 1rem 1rem;
        .nav-group {
            display: flex;
            li {
                padding: 0 1rem;
            }
        }
    }
</style>
