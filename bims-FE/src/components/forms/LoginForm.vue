<script setup lang="ts">
</script>
<template>
   <div>
        <h3>Sign to your account</h3>
        <form method="POST">
            <div class="form-group mt-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Enter your username">
            </div>
            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-primary form-control">Sign In</button>
            </div>
        </form>
   </div>
</template>
