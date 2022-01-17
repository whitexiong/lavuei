<template>


  <nav-bar/>

  <div
      class="grid grid-cols-6  flex min-h-screen bg-gray-50 py-8 flex flex-col justify-center relative  lg:py-12 dark:border-gray-50/[0.06] bg-white supports-backdrop-blur:bg-white/95 dark:bg-gray-500">

    <div class="col-span-2 col-start-1">
      <aside-menu/>
    </div>
    <div class="col-start-2 col-span-6">

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <jet-form-section @submitted="storeProfileInformation">

          <template #description>
            <h2 class="font-semisolid text-xl text-gray-800 leading-tight">
              创建用户
            </h2>
          </template>

          <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="name" value="用户名"/>
              <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name"/>
              <jet-input-error :message="form.errors.name" class="mt-2"/>
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="email" value="邮箱"/>
              <jet-input id="email" type="email"  v-model="form.email" class="mt-1 block w-full" />
              <jet-input-error :message="form.errors.email" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="password" value="密码" />
                <jet-input id="password" type="password"   class="mt-1 block w-full" v-model="form.password" required autocomplete="password" />
                <jet-input-error :message="form.errors.password" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
              <jet-label for="role" value="角色"/>
              <div class="flex items-center" id="se-role">
                <input id="user" name="role" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" v-model="form.role" v-bind:value=1>
                <label for=user class="ml-3 block text-sm font-medium text-gray-700 m-5">
                  user
                </label>
                <input id="admin" name="role" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" v-model="form.role" v-bind:value=0>
                <label for="admin" class="ml-3 block text-sm font-medium text-gray-700">
                  admin
                </label>
              </div>
              <jet-input-error :message="form.errors.role" class="mt-2"/>
            </div>

          </template>

          <template #actions>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
              </jet-action-message>
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                创建
              </button>
            </div>
          </template>
        </jet-form-section>
      </div>
    </div>
  </div>



</template>



<script>
import {defineComponent} from 'vue'
import JetButton from '@/Jetstream/Button.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import NavBar from '@/Components/NavBar.vue'
import AsideMenu from '@/Components/AsideMenu.vue'

export default defineComponent({
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
    NavBar,
    AsideMenu
  },
  props: ['user'],

  data() {

    return {
      form: this.$inertia.form({
        _method: 'POST',
        name: '',
        email: '',
        password: '',
        role: ''
      }),
    }
  },

  methods: {
    storeProfileInformation(props) {
      this.form.post(route('users.store'), {
        errorBag: 'storeProfileInformation',
        preserveScroll: true,
      });
    },
  },


})
</script>
