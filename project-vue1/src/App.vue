<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <div>
    <header>
    <div class="container">
      <nav>
        <div class="logo">
          <RouterLink to="/"><img src="../src/assets/images/eman.png" alt="Home"></RouterLink>
        </div>
        <div class="menu">
          <RouterLink to="/">Home</RouterLink>
          <!-- <RouterLink to="/about">About</RouterLink> -->
          <RouterLink to="/portfolto">Portfolto</RouterLink>
          <RouterLink to="/blogs">Blogs</RouterLink>
          <RouterLink to="/contact">Contact Us</RouterLink>
          
        </div>
        
      </nav>

    </div>
  </header>
  <router-view > </router-view>
  </div>

</template>
