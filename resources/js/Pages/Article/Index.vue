<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semisolid text-xl text-gray-800 leading-tight">
        文章列表
        <a
            :href="route('articles.create')"
            class="float-right"
            v-if="$page.props.permissions.users.viewAny"
        >
          <jet-button class="transition duration-150 ease-in-out hover:scale-25 bg-white">创建文章</jet-button>
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
                      文章标题
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      发布人
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      点赞数
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      收藏数
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      访问量
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      评论数
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      状态
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      创建时间
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      操作
                    </th>
                  </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">

                  <tr v-if="!articles.data.length">
                    <td class="p-4 text-center text-gray-900" colspan="5">
                      No data
                    </td>
                  </tr>

                  <tr v-for="article in articles.data" :key="article.id">

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ article.title }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ article.name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ article.likes }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ article.collects }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ article.views }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ article.comments }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ article.status }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ article.created_at }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <a
                          :href="route('articles.edit', article.id)"
                          class="ml-2 text-indigo-600 hover:text-indigo-900"
                          v-if="article.can.update"
                      >
                        编辑
                      </a>

                      <a
                          :href="route('articles.show', article.id)"
                          class="ml-2 text-indigo-600 hover:text-indigo-900"
                          v-if="article.can.view"
                      >
                        查看
                      </a>

                      <a
                          :href="route('articles.destroy', article.id)"
                          class="ml-2 text-indigo-600 hover:text-indigo-900"
                          v-if="article.can.destroy"
                      >
                        删除
                      </a>

                    </td>
                  </tr>
                  <!-- More people... -->
                  </tbody>
                </table>
                <jet-pagination class="m-5" :links="articles.links" />
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
import JetPagination from '@/Components/Pagination.vue';

export default defineComponent({
  components: {
    AppLayout,
    JetButton,
    JetPagination
  },
  props: ['articles'],
})
</script>
