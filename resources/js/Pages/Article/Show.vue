<template>
  <app-layout title="Dashboard">
    <template #header>

    </template>

    <div class="py-1 container mx-auto">
      <div class="max-w-7 h-24  bg-origin-content rounded-full py-3 px-6  ring-opacity-50 shadow-xl hover:scale-x-95 bg-scroll divide-y-2 divide-blue-200 divide-dashed">
        <!--          <div class="max-w-2xl h-20 bg-origin-content rounded-full py-3 px-6  ring-opacity-50 shadow-xl hover:scale-x-95 bg-scroll" style="background-image:url('http://laravel.test/images/bg.png');">-->
        <div class="text-4xl">
            {{ article.title }}
        </div>
        文章分类 / {{ article.viewSet }} / {{ article.comments }} / 发布时间: {{ article.created_at }}

      </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg divide-black divide-opacity-25 m-5 mx-24">

          <mavon-editor ref="editor" class="markdown-body w-full" v-html="rawHtml"></mavon-editor>
        </div>
    </div>
  </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import {mavonEditor} from "mavon-editor";
import "mavon-editor/dist/css/index.css";
import 'mavon-editor/dist/markdown/github-markdown.min.css'


export default defineComponent({
  components: {
    AppLayout,
    mavonEditor,
  },
  name: 'editor',
  props: ['article'],
  computed: {
    rawHtml: function() {
      return mavonEditor.mixins[0].data().markdownIt.render(this.article.body);
    }
  },
})

</script>
