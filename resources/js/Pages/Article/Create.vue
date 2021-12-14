<template>

  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semisolid text-xl text-gray-800 leading-tight">
        创建文章
      </h2>
    </template>

    <div class="py-12 max-w-full">
      <div class="max-w-7xl">
        <jet-form-section @submitted="storeProfileInformation" class="max-w-screen-2xl">
          <template #form>

            <div class="col-span-6 sm:col-span-4">
              <jet-label for="title" value="文章标题"/>
              <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="title"/>
              <jet-input-error :message="form.errors.title" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
              <jet-label for="subtitle" value="副标题"/>
              <jet-input id="subtitle" type="text"  v-model="form.subtitle" class="mt-1 block w-full" />
              <jet-input-error :message="form.errors.subtitle" class="mt-2"/>
            </div>

            <div class="col-span-6 md:col-span-6">
              <jet-label for="subtitle" value="文章内容"/>
              <div class="pt-6">
                    <mavon-editor ref="editor"  :ishljs="true" @imgAdd="$imgAdd" @imgDel="$imgDel" v-model="form.body" class="w-full"> </mavon-editor>
              </div>
              <jet-input-error :message="form.errors.body" class="mt-2"/>
            </div>


            <div class="col-span-6 sm:col-span-4">
              <jet-label for="role" value="文章状态"/>
              <div class="flex items-center" id="se-role">
                <input id="enable" name="role" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" v-model="form.status" v-bind:value=1>
                <label for=enable class="ml-3 block text-sm font-medium text-gray-700 m-5">
                  开启
                </label>
                <input id="disable" name="role" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" v-model="form.status" v-bind:value=0>
                <label for="disable" class="ml-3 block text-sm font-medium text-gray-700">
                  关闭
                </label>
              </div>
              <jet-input-error :message="form.errors.status" class="mt-2"/>
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
  </app-layout>
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
import AppLayout from '@/Layouts/AppLayout.vue'
import {mavonEditor} from "mavon-editor"
import "mavon-editor/dist/css/index.css"




export default defineComponent({
  name: "Create",

  components: {
    mavonEditor,
    AppLayout,
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
  },
  props: {
    user: Object,
  },



  data() {
    return {
      form: this.$inertia.form({
        _method: 'POST',
        user_id: this.user.id,
        categories_id: 1,
        comments: 0,
        title: '',
        subtitle: '',
        body: '',
        status: '',
      }),
      imgFile: new Set,
    }
  },

  methods: {

    storeProfileInformation(props) {
      this.form.post(route('articles.store'), {
        errorBag: 'storeProfileInformation',
        preserveScroll: true,
      });
    },
    // 绑定@imgAdd event
    $imgAdd(pos, $file){
      let vm = this;
      // 第一步.将图片上传到服务器.
      let formData = new FormData();
      formData.append('image', $file);
      axios({
        url: route('file-system.upload-image'),
        method: 'post',
        data: formData,
        headers: { 'Content-Type': 'multipart/form-data' },
      }).then((url) => {
        // 第二步.将返回的url替换到文本原位置![...](0) -> ![...](url)
        // $vm.$img2Url 详情见本页末尾
        vm.imgFile.add(url.data.path)
        console.log(vm.imgFile)
        this.$refs.editor.$img2Url(pos, url.data.path);
      })
    },
    $imgDel(rs) {
      console.log(this.imgFile);
    }

  },


})
</script>
