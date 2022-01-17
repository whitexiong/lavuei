<template>

  <nav-bar/>

  <div
      class="grid grid-cols-6  flex min-h-screen bg-gray-50 py-8 flex flex-col justify-center relative  lg:py-12 dark:border-gray-50/[0.06] bg-white supports-backdrop-blur:bg-white/95 dark:bg-gray-500">

    <div class="col-span-2 col-start-1">
      <aside-menu/>
    </div>


    <div class="col-start-2 col-span-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <jet-form-section @submitted="updateProfileInformation">

          <template #description>
            更新你的用户
          </template>

          <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="name" value="Name"/>
              <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name"/>
              <jet-input-error :message="form.errors.name" class="mt-2"/>
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="email" value="Email"/>
              <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email"/>
              <jet-input-error :message="form.errors.email" class="mt-2"/>
            </div>
          </template>

          <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
              Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Save
            </jet-button>
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
        _method: 'PUT',
        name: this.user.name,
        email: this.user.email,
      }),
    }
  },

  methods: {
    updateProfileInformation(props) {

      this.form.post(route('users.update', this.user.id), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
      });
    },
  },
})
;
</script>
