<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semisolid text-xl text-gray-800 leading-tight">
        创建标签
      </h2>
    </template>
    <div>
      <div class="lg:grid md:grid-cols-5 md:gap-9">
        <div class="mt-10 md:mt-0 md:col-span-8">
          <form @submit.prevent="submit">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
              <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-3 gap-6">
                  <div class="col-span-3 sm:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700" >
                      标签名称
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <input type="text" name="name" id="name" v-model="form.name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="laravel">
                      {{ errors.names }}
                    </div>
                  </div>
                </div>

                <div class="grid grid-cols-3 gap-6">
                  <div class="col-span-3 sm:col-span-2">
                    <label for="type" class="block text-sm font-medium text-gray-700">
                      标签类型
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <input type="text" name="type" id="type" v-model="form.type" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="laravel">
                    </div>
                  </div>
                </div>

                <fieldset>
                  <div>
                    <legend class="text-base font-medium text-gray-900">状态</legend>
                  </div>
                  <div class="mt-4 space-y-4">
                    <div class="flex items-center">
                      <input id="enable" name="status" type="radio"  v-model="form.status" v-bind:value="1" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                      <label for="enable" class="ml-3 block text-sm font-medium text-gray-700">
                        开启
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input id="disable" name="status" type="radio" v-model="form.status"  v-bind:value="0" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                      <label for="disable" class="ml-3 block text-sm font-medium text-gray-700">
                        禁用
                      </label>
                    </div>
                  </div>
                </fieldset>

              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Save
                </button>
              </div>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </app-layout>
</template>


<script>
import {defineComponent, reactive} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import {Inertia} from '@inertiajs/inertia'

export default defineComponent({
  components: {
    AppLayout,
  },
  props: ['errors'],
  setup() {
    const form = reactive({
      name: null,
      type: null,
      status: 1,
    })

    function submit() {
      Inertia.post('/tags/store', form)
    }

    return {form, submit}
  },
})
</script>
