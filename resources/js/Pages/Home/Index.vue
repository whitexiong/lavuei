<template>
  <jet-nav/>

  <div
      class="grid grid-cols-1 md:gap-6 lg:grid-cols-3 flex min-h-screen bg-gray-50 py-8 flex flex-col justify-center relative overflow-hidden lg:py-12 dark:border-gray-50/[0.06] bg-white supports-backdrop-blur:bg-white/95 dark:bg-gray-500">

    <div class="col-span-2">
      <div
          class="relative border border-gray-100 dark:border-gray-900 w-full px-6 py-12 shadow-xl shadow-slate-700/10 ring-1 ring-gray-900/5  lg:pt-16 lg:pb-28 md:rounded">

        <div v-for="article in articles.data" :key="article.id"
             class="max-w-4xl px-10 my-4 py-6 bg-white rounded-lg shadow-md dark:bg-gray-500 border border-gray-100 dark:border-gray-900">
          <div class="flex justify-between items-center">
            <span class="font-light text-gray-600 dark:text-gray-200">{{ article.created_at }}</span>
            <!--            <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500" href="#">Design</a>-->
          </div>
          <div class="mt-2">
            <a class="text-2xl text-gray-700 font-bold hover:text-gray-600 dark:text-gray-200"
               :href="route('home.article-detail', article.id)"
            >
              {{ article.title }}
            </a>
            <div class="mt-2 text-gray-600 dark:text-gray-200">{{ article.subtitle }}</div>
          </div>
          <div class="flex justify-between items-center mt-4">

            <a class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-gray-100 text-gray-700 hover:bg-gray-200 hover:text-gray-900 focus:ring-gray-500 dark:bg-gray-700 dark:text-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500"
               :href="route('home.article-detail', article.id)"><font style="vertical-align: inherit;"><font
                style="vertical-align: inherit;">阅读更多</font></font>

              <svg
                  class="overflow-visible ml-3 text-gray-300 group-hover:text-gray-400 dark:text-gray-500 dark:group-hover:text-gray-400"
                  width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                <path d="M0 0L3 3L0 6"></path>
              </svg>
            </a>
            <div>
              <a class="flex items-center" href="#">
                <img class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block"
                     src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=373&q=80"
                     alt="avatar">
                <h1 class="text-gray-700 font-bold">Khatab wedaa</h1>
              </a>
            </div>
          </div>
        </div>


          <jet-pagination class="mt-8" :links="articles.links"/>

      </div>

    </div>

    <home-right/>

  </div>


  <jet-footer/>
</template>

<script>

import {defineComponent} from 'vue'
import JetNav from '@/Layouts/Nav.vue'
import HomeRight from '@/Layouts/HomeRight.vue'
import JetFooter from '@/Layouts/Footer.vue'
import JetPagination from '../../Components/Pagination.vue';
import HeroBar from '../../Components/HeroBar.vue'


export default defineComponent({
  components: {
    JetNav,
    JetFooter,
    JetPagination,
    HeroBar,
    HomeRight
  },
  props: ['articles'],
  methods: {},
})

</script>

