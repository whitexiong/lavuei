<script>

import {defineComponent} from 'vue'
import CardComponent from '../Components/CardComponent.vue'
import Field from '../Components/Field.vue'
import Control from '../Components/Control.vue'


const submit = () => {
  //
}

export default defineComponent({
  components: {
    CardComponent,
    Field,
    Control,
  },

  props: ['article'],
  computed: {
    rawHtml: function () {
      return mavonEditor.mixins[0].data().markdownIt.render(this.article.body);
    }
  },
  methods: {},
})

</script>


<template>
  <div class="">
    <card-component
        class="overflow-auto h-96 max-h-full md:max-h-screen col-span-1 shadow-xl shadow-slate-700/10 ring-1 ring-gray-900/5 md:rounded dark:bg-gray-800 dark:ring-0 dark:highlight-white/5 dark:bg-gray-500 dark:text-white"
        title="标签"
    >

      <div class='px-5 py-3'>
        <!-- This is the tags container -->
        <div class='my-3 flex flex-wrap -m-1'>
            <span
                class="m-1 bg-pink-600 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">#winter</span>
          <span
              class="m-1 bg-blue-200 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">#stark</span>
          <span
              class="m-1 bg-pink-600 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">#gameofthrones</span>
          <span
              class="m-1 bg-gray-200 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">#battle</span>
          <span
              class="m-1 bg-gray-200 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">#kinglandings</span>
        </div>
      </div>


    </card-component>


    <card-component
        class="mt-8 overflow-auto h-96 max-h-full md:max-h-screen col-span-1 shadow-xl shadow-slate-700/10 ring-1 ring-gray-900/5 md:rounded dark:bg-gray-800 dark:ring-0 dark:highlight-white/5 dark:bg-gray-500 dark:text-white"
        title="热门文章"
    >

      <div class='px-5 py-3'>
        <!-- This is the tags container -->
        <div class='my-3 flex flex-wrap -m-1'>
        </div>
      </div>


    </card-component>


    <card-component
        class="mt-8 overflow-auto h-96 max-h-full md:max-h-screen col-span-1 shadow-xl shadow-slate-700/10 ring-1 ring-gray-900/5 md:rounded dark:bg-gray-800 dark:ring-0 dark:highlight-white/5 dark:bg-gray-500 dark:text-white"
        title="最近评论"
    >

      <div class='px-5 py-3'>
        <!-- This is the tags container -->
        <div class='my-3 flex flex-wrap -m-1'>
        </div>
      </div>


    </card-component>


    <card-component
        class="mt-8 overflow-auto h-96 max-h-full md:max-h-screen col-span-1 shadow-xl shadow-slate-700/10 ring-1 ring-gray-900/5 md:rounded dark:bg-gray-800 dark:ring-0 dark:highlight-white/5 dark:bg-gray-500 dark:text-white"
        title="链接导航"
    >

      <div class='px-5 py-3'>
        <!-- This is the tags container -->
        <div class='my-3 flex flex-wrap -m-1'>
        </div>
      </div>


    </card-component>


  </div>

</template>
