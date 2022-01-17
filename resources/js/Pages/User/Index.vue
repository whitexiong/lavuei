<script>
import {computed, defineComponent,ref} from 'vue'
import NavBar from '@/Components/NavBar.vue'
import AsideMenu from '@/Components/AsideMenu.vue'
import stores from '@/store'
import {darkModeKey} from '@/config.js'
import JetButton from '@/Jetstream/Button.vue'
import ModalBox from '@/Components/ModalBox.vue'



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

const isModalActive = ref(false)

const isModalDangerActive = ref(false)


export default defineComponent({
  components: {
    NavBar,
    AsideMenu,
    JetButton,
    ModalBox
  },

  props: ['users', 'menu'],
})


</script>
<template>

  <modal-box
      v-model="isModalActive"
      title="Sample modal"
  >
    <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
    <p>This is sample modal</p>
  </modal-box>

  <modal-box
      v-model="isModalDangerActive"
      large-title="确认删除吗"
      button="danger"
      has-cancel
  >
    <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
    <p>This is sample modal</p>
  </modal-box>

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
            用户列表
            <a
                :href="route('users.create')"
                class="float-right"
                v-if="$page.props.permissions.users.viewAny"
            >
              <jet-button class="transition duration-150 ease-in-out hover:scale-25 bg-white">创建用户</jet-button>
            </a>
          </h2>

          <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
              <thead class="">
              <tr>
                <th scope="col"
                    class="dark:text-gray-100 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  名称
                </th>
                <th scope="col"
                    class="dark:text-gray-100 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  邮件
                </th>
                <th scope="col"
                    class="dark:text-gray-100 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  角色
                </th>
                <th scope="col"
                    class="dark:text-gray-100 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  操作
                </th>
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
              <tr v-for="user in users" :key="user.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img class="h-10 w-10 rounded-full"
                           src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                           alt="">
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                        {{ user.name }}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-100">
                  {{ user.email }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-100">
                  {{ user.role }}
                </td>

<!--                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-->
<!--                  <a-->
<!--                      :href="route('users.edit', user.id)"-->
<!--                      class="ml-2 text-indigo-600 hover:text-indigo-900"-->
<!--                      v-if="user.can.update"-->
<!--                  >-->
<!--                    编辑-->
<!--                  </a>-->

<!--                  <a-->
<!--                      :href="route('users.show', user.id)"-->
<!--                      class="ml-2 text-indigo-600 hover:text-indigo-900"-->
<!--                      v-if="user.can.view"-->
<!--                  >-->
<!--                    查看-->
<!--                  </a>-->

<!--                  <a-->
<!--                      :href="route('users.destroy', user.id)"-->
<!--                      class="ml-2 text-indigo-600 hover:text-indigo-900"-->
<!--                      v-if="user.can.destroy"-->
<!--                  >-->
<!--                    删除-->
<!--                  </a>-->

<!--                </td>-->

                <td class="actions-cell">
                  <jb-buttons
                      type="justify-start lg:justify-end"
                      no-wrap
                  >
                    <jb-button
                        color="success"
                        :icon="mdiEye"
                        small
                        @click="isModalActive = true"
                    />
                    <jb-button
                        color="danger"
                        :icon="mdiTrashCan"
                        small
                        @click="isModalDangerActive = true"
                    />
                  </jb-buttons>
                </td>
              </tr>
              <!-- More people... -->
              </tbody>
            </table>


            <div
                class="px-5 py-5 border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                        <span class="text-xs xs:text-sm text-gray-900">
                            Showing 1 to 4 of 50 Entries
                        </span>
              <div class="inline-flex mt-2 xs:mt-0">
                <button
                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
                  Prev
                </button>
                <button
                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                  Next
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>


<script setup>
import { mdiEye, mdiTrashCan } from '@mdi/js'
import JbButtons from '@/Components/JbButtons.vue'
import JbButton from '@/Components/JbButton.vue'

</script>

