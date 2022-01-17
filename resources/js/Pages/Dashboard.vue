<script setup>
import {computed, ref} from 'vue'
import menu from '@/menu.js'
import NavBar from '@/Components/NavBar.vue'
import AsideMenu from '@/Components/AsideMenu.vue'
import FooterBar from '@/Components/FooterBar.vue'
import Overlay from '@/Components/Overlay.vue'
import stores from '@/store'


const isAsideLgActive = computed(() => stores.state.isAsideLgActive)

const overlayClick = () => {
  stores.dispatch('asideLgToggle', false)
}

const titleStack = ref(['Admin', 'Dashboard'])

const chartData = ref(null)


</script>

<template>
  <nav-bar/>
  <aside-menu :menu="menu"/>
  <footer-bar/>
  <overlay
      v-show="isAsideLgActive"
      z-index="z-30"
      @overlay-click="overlayClick"
  />
</template>
