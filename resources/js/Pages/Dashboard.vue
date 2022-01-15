<script setup>
import { computed } from 'vue'
import menu from '../menu.js'
import NavBar from '../Components/NavBar.vue'
import AsideMenu from '../Components/AsideMenu.vue'
import stores from '../store'


</script>

<template>

  <nav-bar />
  <aside-menu :menu="menu" />
  <router-view />
<!--  <footer-bar />-->
</template>
