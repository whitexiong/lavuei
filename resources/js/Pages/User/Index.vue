<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semisolid text-xl text-gray-800 leading-tight">
        用户列表
        <a
            :href="route('users.create')"
            class="float-right"
            v-if="$page.props.permissions.users.viewAny"
        >
          <jet-button class="transition duration-150 ease-in-out hover:scale-25 bg-white">创建用户</jet-button>
        </a>

      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                  <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      名称
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      邮件
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      角色
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      操作
                    </th>
                  </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="user in users" :key="user.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          <img class="h-10 w-10 rounded-full"
                               src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                               alt="">
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{ user.name }}
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ user.email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ user.role }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <a
                          :href="route('users.edit', user.id)"
                          class="ml-2 text-indigo-600 hover:text-indigo-900"
                          v-if="user.can.update"
                      >
                        编辑
                      </a>

                      <a
                          :href="route('users.show', user.id)"
                          class="ml-2 text-indigo-600 hover:text-indigo-900"
                          v-if="user.can.view"
                      >
                        查看
                      </a>

                      <a
                          :href="route('users.destroy', user.id)"
                          class="ml-2 text-indigo-600 hover:text-indigo-900"
                          v-if="user.can.destroy"
                      >
                        删除
                      </a>

                    </td>
                  </tr>
                  <!-- More people... -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import JetButton from '@/Jetstream/Button.vue';

export default defineComponent({
  components: {
    AppLayout,
    JetButton,
  },
  props: ['users'],
})
</script>
