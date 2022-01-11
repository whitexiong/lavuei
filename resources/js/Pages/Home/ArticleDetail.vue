<template>
  <jet-nav/>


  <div
      class="grid grid-cols-1 md:gap-6  lg:grid-cols-3 flex min-h-screen bg-gray-50 py-8 flex flex-col justify-center relative overflow-hidden lg:py-12 dark:border-gray-50/[0.06] bg-white supports-backdrop-blur:bg-white/95 dark:bg-gray-500">


    <div class="col-span-2">
      <div
          class="relative border border-gray-100  dark:border-gray-900 w-full px-6 py-12 shadow-xl shadow-slate-700/10 ring-1 ring-gray-900/5  lg:pt-16 lg:pb-28 md:rounded">
        <div class="w-full space-y-4 text-center">
          <p class="text-xs font-semibold tracking-wider uppercase">#TailwindCSS</p>
          <h1 class="text-4xl font-bold leading-tight md:text-5xl dark:text-gray-100">{{ article.title }}</h1>
          <p class="text-sm text-coolGray-600">by
            <a href="#" target="_blank" rel="noopener noreferrer" class="underline text-indigo-600">
              <span itemprop="name">Leroy Jenkins</span>
            </a>on
            <time datetime="2021-02-12 15:34:18-0200">{{ article_created_at }}</time>
          </p>
        </div>

        <div class="mt-8 prose prose-slate lg:prose-lg dark:prose-invert max-w-none">
          <div class="" v-viewer="{movable: false}" v-html="rawHtml"></div>
        </div>
      </div>

      <!--      评论-->
      <Comments/>

    </div>


    <!--    右侧-->
    <home-right/>
  </div>


  <jet-footer/>
</template>

<script>

import {defineComponent} from 'vue'
import {mdiAlertCircle, mdiBallot} from '@mdi/js'
import JetNav from '@/Layouts/Nav.vue'
import JetFooter from '@/Layouts/Footer.vue'
import {mavonEditor} from "mavon-editor"
import "mavon-editor/dist/css/index.css"
import 'mavon-editor/dist/markdown/github-markdown.min.css'
import Field from '@/components/Field.vue'
import Control from '@/components/Control.vue'
import JbButton from '@/components/JbButton.vue'
import JbButtons from '@/components/JbButtons.vue'
import Comments from '@/components/Comments'
import HomeRight from '@/Layouts/HomeRight'
import 'viewerjs/dist/viewer.css'
import {directive as viewer} from "v-viewer"


const submit = () => {
  //
}

export default defineComponent({
  components: {
    JetNav,
    JetFooter,
    mavonEditor,
    JbButton,
    JbButtons,
    mdiBallot,
    mdiAlertCircle,
    HomeRight,
    Field,
    Control,
    Comments,
  },
  directives: {
    viewer: viewer({
      debug: true,
    }),
  },
  props: ['article'],
  computed: {
    rawHtml: function () {
      return mavonEditor.mixins[0].data().markdownIt.render(this.article.body);
    },
  },
  methods: {},
})

</script>