<script setup>
import { computed } from 'vue'
import stores from '@/store'

// const stores = useStore()

const isFullScreen = true

</script>

<template>
  <section
    class="px-0 md:px-6 flex-none md:flex-1"
    :class="[ isFullScreen ? 'flex h-screen items-center justify-center' : 'py-6 flex h-screen items-center justify-center' ]"
  >
    <slot />
  </section>
  
</template>
