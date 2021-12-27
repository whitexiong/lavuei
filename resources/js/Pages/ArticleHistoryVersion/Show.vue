<template>
  <app-layout title="Dashboard">

    <template #header>
      <button type="submit" v-on:click="viewRendering()"
              class="ml-8 text-sm font-semibold bg-green-500 py-3 px-4 rounded-lg hover:bg-gray-300 hover:text-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900 bg-sky-300">
        使用此版本
      </button>
      <div class="flex items-center justify-between float-right">
        <h2>
            <span style="vertical-align: inherit;">
              <span style="vertical-align: inherit;">历史版本</span>
            </span>
        </h2>
        <button v-on:click="sidebarToggle()">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
               class="w-5 h-5 fill-current text-coolGray-800">
            <rect width="352" height="32" x="80" y="96"></rect>
            <rect width="352" height="32" x="80" y="240"></rect>
            <rect width="352" height="32" x="80" y="384"></rect>
          </svg>
        </button>
      </div>

    </template>

    <div class="mx-auto bg-grey-400">

      <div class="min-h-screen flex flex-col">
        <div class="flex flex-1">
          <div class="bg-white-300 flex-1 p-3 overflow-hidden">
            <code-diff
                :old-string="oldStr"
                :new-string="newStr"
                file-name="test.txt"
                output-format="side-by-side"/>

            <div class="flex flex-wrap">
              <div class="w-full">
                <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                  <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal"
                       v-on:click="toggleTabs(1)"
                       v-bind:class="{'text-blueGray-600 bg-white': openTab !== 1, 'text-white bg-blueGray-600': openTab === 1}">
                      <i class="fas fa-space-shuttle text-base mr-1"></i> 修改前
                    </a>

                  </li>
                  <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal"
                       v-on:click="toggleTabs(2)"
                       v-bind:class="{'text-blueGray-600 bg-white': openTab !== 2, 'text-white bg-blueGray-600': openTab === 2}">
                      <i class="fas fa-cog text-base mr-1"></i> 修改后
                    </a>
                  </li>
                </ul>
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                  <div class="px-4 py-5 flex-auto">
                    <div class="tab-content tab-space">
                      <div v-bind:class="{'hidden': openTab !== 1, 'block': openTab === 1}">

                        <mavon-editor ref="editor" class="markdown-body w-full" v-html="rawHtml"></mavon-editor>

                      </div>
                      <div v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">

                        <mavon-editor ref="editor" class="markdown-body w-full" v-html="raw2Html"></mavon-editor>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="flex flex-col h-full p-3 bg-coolGray-50 text-coolGray-800" id="sidebar">
            <div class="space-y-3">


              <div class="relative">
				<span class="absolute inset-y-0 left-0 flex items-center py-4">
					<button type="submit" class="p-2 focus:outline-none focus:ring">
						<svg fill="currentColor" viewBox="0 0 512 512" class="w-5 h-5 text-coolGray-600">
							<path
                  d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z"></path>
						</svg>
					</button>
				</span>
                <input type="search" name="Search" placeholder="搜索..."
                       class="w-full py-2 pl-10 text-sm border-transparent rounded-md focus:outline-none bg-coolGray-100 text-coolGray-800 focus:bg-coolGray-50">
              </div>
              <div class="flex-1">

                <ul v-for="article in articleHistoryVersionsList.data" :key="article.id"
                    class="pt-2 pb-4 space-y-1 text-sm bg-coolGray-100 text-coolGray-800">

                  <li v-bind:class="{ 'hover:bg-gray-300': isActive }"
                      class="hover:text-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900">
                    <article>
                      <a :href="route('article-history-version.show', article.id)"
                         class="grid p-4 overflow-hidden md:grid-cols-5 rounded-xl lg:p-6 xl:grid-cols-13 hover:bg-coolGray-50">
                        <h3 class="mb-1 ml-8 font-semibold md:col-start-2 md:col-span-4 md:ml-0 xl:col-start-3 xl:col-span-9">
                          {{ article.title }}</h3>
                        <time datetime="" class="row-start-1 mb-1 md:col-start-1 xl:col-span-2 text-coolGray-600">
                          {{ article.created_at }}
                        </time>
                        <span>编辑人: white</span>
                      </a>
                    </article>
                  </li>
                </ul>
              </div>
            </div>

            <jet-pagination class="m-5" :links="articleHistoryVersionsList.links"/>

          </div>

        </div>
      </div>
    </div>
  </app-layout>
</template>


<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetPagination from '@/Components/Pagination.vue';
import {CodeDiff} from 'v-code-diff'
import {mavonEditor} from "mavon-editor"
import "mavon-editor/dist/css/index.css"


export default defineComponent({
  name: "blueGray-tabs",
  components: {
    AppLayout,
    CodeDiff,
    JetPagination,
    mavonEditor,
  },
  props: ['articleHistoryVersion', 'articleHistoryVersionsList'],
  data() {
    console.log(this.articleHistoryVersion)
    return {
      oldStr: this.articleHistoryVersion.origin_body,
      newStr: this.articleHistoryVersion.target_body,
      isActive: false,
      openTab: 1
    }
  },

  methods: {
    toggleTabs: function (tabNumber) {
      this.openTab = tabNumber
    },
    sidebarToggle: function () {
      var sidebar = document.getElementById('sidebar');
      if (sidebar.style.display === "none") {
        sidebar.style.display = "block";
      } else {
        sidebar.style.display = "none";
      }
    }
  },
  computed: {
    rawHtml: function () {
      return mavonEditor.mixins[0].data().markdownIt.render(this.oldStr);
    },
    raw2Html: function () {
      return mavonEditor.mixins[0].data().markdownIt.render(this.newStr);
    },
  },
})
</script>
