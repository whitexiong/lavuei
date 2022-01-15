<template>
  <div class="antialiased mx-auto max-w-screen-sm">

    <comment class="space-y-4">

      <h3 class="mb-4 text-lg font-semibold text-gray-900">评论列表</h3>

      <section
          class="relative border border-gray-100  dark:border-gray-900 w-full px-6 mt-8 py-12 shadow-xl shadow-slate-700/10 ring-1 ring-gray-900/5  lg:pt-16 lg:pb-28">

        <div class="flex">
          <div class="flex-shrink-0 mr-3">
            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10"
                 src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                 alt="">
          </div>
          <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
            <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
            <p class="text-sm">
              Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
              sed diam nonumy eirmod tempor invidunt ut labore et dolore
              magna aliquyam erat, sed diam voluptua.
            </p>
            <div class="mt-4 flex items-center">
              <div class="flex -space-x-2 mr-2">
                <img class="rounded-full w-6 h-6 border border-white"
                     src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80"
                     alt="">
                <img class="rounded-full w-6 h-6 border border-white"
                     src="https://images.unsplash.com/photo-1513956589380-bad6acb9b9d4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80"
                     alt="">
              </div>
              <div class="text-sm text-gray-500 font-semibold">
                5 Replies
              </div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="flex-shrink-0 mr-3">
            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10"
                 src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                 alt="">
          </div>
          <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
            <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
            <p class="text-sm">
              Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
              sed diam nonumy eirmod tempor invidunt ut labore et dolore
              magna aliquyam erat, sed diam voluptua.
            </p>

            <h4 class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs">Replies</h4>

            <div class="space-y-4">
              <div class="flex">
                <div class="flex-shrink-0 mr-3">
                  <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8"
                       src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                       alt="">
                </div>
                <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                  <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                  <p class="text-xs sm:text-sm">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore
                    magna aliquyam erat, sed diam voluptua.
                  </p>
                </div>
              </div>
              <div class="flex">
                <div class="flex-shrink-0 mr-3">
                  <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8"
                       src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                       alt="">
                </div>
                <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                  <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                  <p class="text-xs sm:text-sm">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore
                    magna aliquyam erat, sed diam voluptua.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <field
            label="评论"
            help="你可以输入 Markdown"
        >
          <control
              type="textarea"
              placeholder="Explain how we can help you"
          />
        </field>


        <jb-buttons>
          <jb-button
              type="submit"
              color="info"
              label="Submit"
          />
          <jb-button
              type="reset"
              color="info"
              outline
              label="Reset"
          />
        </jb-buttons>

        <div
            class="select-auto border border-gray-100  dark:border-gray-900 mt-8 text-center bg-white text-gray-900 font-semibold font-sans text-sm shadow-lg rounded-lg ring-1 ring-gray-900/5 px-4 py-3 dark:bg-gray-800 dark:ring-0 dark:highlight-white/5 dark:bg-gray-500 dark:text-white"
            id="preview-box">
          dasdsadas
        </div>

      </section>

    </comment>
  </div>
</template>

<script>

import {defineComponent} from 'vue'
import Field from '../Components/Field.vue'
import Control from '../Components/Control.vue'
import JbButton from '../Components/JbButton.vue'
import JbButtons from '../Components/JbButtons.vue'

export default defineComponent({
  components: {
    JbButton,
    JbButtons,
    Field,
    Control
  },


  methods: {},
})



</script>