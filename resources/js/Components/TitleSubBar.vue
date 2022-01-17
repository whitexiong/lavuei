<script setup>
import { mdiCog } from '@mdi/js'
import { computed } from 'vue'
import Icon from '@/Components/Icon.vue'
import JbButton from '@/Components/JbButton.vue'
import stores from '@/store'

defineProps({
  icon: {
    type: String,
    default: null
  },
  title: {
    type: String,
    required: true
  }
})


const darkMode = computed(() => stores.state.darkMode)
</script>

<template>
  <section class="px-6 sm:px-0 mb-6 flex items-center justify-between">
    <div class="flex items-center justify-start">
      <icon
        v-if="icon"
        :path="icon"
        class="mr-3"
      />
      <h1 class="text-2xl">
        {{ title }}
      </h1>
    </div>
    <jb-button
      :icon="mdiCog"
      :outline="darkMode"
      small
    />
  </section>
</template>
