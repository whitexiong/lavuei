<script>
import {computed, defineComponent} from 'vue'
import NavBar from '@/Components/NavBar.vue'
import AsideMenu from '@/Components/AsideMenu.vue'
import stores from '@/store'
import {darkModeKey} from '@/config.js'
import JetButton from '@/Jetstream/Button.vue';
import JetPagination from '@/Components/Pagination.vue';

const isAsideLgActive = computed(() => stores.state.isAsideLgActive)

const overlayClick = () => {
  stores.dispatch('asideLgToggle', true)
}

/* Dark mode */
const localStorageDarkModeValue = localStorage.getItem(darkModeKey)

if ((localStorageDarkModeValue === null && window.matchMedia('(prefers-color-scheme: dark)').matches) || localStorageDarkModeValue === '1') {
  stores.dispatch('darkMode')
}

const darkMode = computed(() => stores.state.darkMode)


export default defineComponent({
  components: {
    NavBar,
    AsideMenu,
    JetButton,
    JetPagination,
  },

  props: ['articles', 'menu'],
})


</script>
<template>

  <nav-bar/>


  <div
      class="grid grid-cols-6  flex min-h-screen bg-gray-50 py-8 flex flex-col justify-center relative  lg:py-12 dark:border-gray-50/[0.06] bg-white supports-backdrop-blur:bg-white/95 dark:bg-gray-500">

    <div class="col-span-2 col-start-1">
      <aside-menu/>
    </div>

    <div
        class="col-start-2 col-span-6">

      <div class="py-8">

        <div class="px-4 sm:px-8 py-4 overflow-x-auto table-auto">

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

          <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
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


            <div
                class="px-5 py-5 border-t flex flex-col xs:flex-row items-center xs:justify-between">
                 <jet-pagination class="m-5" :links="articles.links" />

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


</template>




