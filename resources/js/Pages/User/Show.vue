<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        用户详情
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="col-span-3 sm:col-span-2">
            <label for="name" class="block text-sm font-medium text-gray-700" >
              标签名称
            </label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="text" name="name" id="name" value='{{ user.name }}' class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
              {{ user.name }}
            </div>
          </div>
          {{ user.email }}
          {{ user.role }}
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
  props: ['user'],
})
</script>
