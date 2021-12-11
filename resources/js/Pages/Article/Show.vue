<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        文章详细
      </h2>
    </template>

    <div class="py-6 container mx-auto">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg divide-black divide-opacity-25 m-24">
              {{ article.body }}
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
  components: {
    AppLayout,
  },
  props: ['article'],
})
</script>
