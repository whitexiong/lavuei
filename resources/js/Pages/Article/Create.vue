<template>

  <app-layout title="Dashboard">
    <template #header>
      <button type="submit" id="viewEdit" @click="$viewEdit" class="text-sm font-semibold bg-green-500 py-3 px-4 rounded-lg hover:bg-gray-300 hover:text-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900 bg-sky-300">{{ viewEditValue }}</button>
      <button type="submit" id="" @click="$viewEdit" class="ml-8 text-sm font-semibold bg-green-500 py-3 px-4 rounded-lg hover:bg-gray-300 hover:text-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900 bg-sky-300">{{ synData }}</button>

    </template>


    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <jet-form-section @submitted="storeProfileInformation" class="max-w-screen-2xl">
          <template #form>
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="title" value="文章标题"/>
              <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="title"/>
              <jet-input-error :message="form.errors.title" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
              <jet-label for="subtitle" value="副标题"/>
              <jet-input id="subtitle" type="text" v-model="form.subtitle" class="mt-1 block w-full"/>
              <jet-input-error :message="form.errors.subtitle" class="mt-2"/>
            </div>

            <div class="col-span-6 md:col-span-6">
              <jet-label for="subtitle" value="文章内容"/>
              <div class="pt-6">

                <mavon-editor ref="editor" @save="$save" @change="$change" :ishljs="true" @imgAdd="$imgAdd"
                              @imgDel="$imgDel"
                              v-model="form.body" class="w-full"></mavon-editor>
              </div>
              <jet-input-error :message="form.errors.body" class="mt-2"/>
            </div>


            <div class="col-span-6 sm:col-span-4">
              <jet-label for="role" value="文章状态"/>
              <div class="flex items-center" id="se-role">
                <input id="enable" name="role" type="radio"
                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" v-model="form.status"
                       v-bind:value=1>
                <label for=enable class="ml-3 block text-sm font-medium text-gray-700 m-5">
                  开启
                </label>
                <input id="disable" name="role" type="radio"
                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" v-model="form.status"
                       v-bind:value=0>
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
              <button type="submit"
                      class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
import JetButton from '../../Jetstream/Button.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import {mavonEditor} from "mavon-editor"
import "mavon-editor/dist/css/index.css"

let ws = new WebSocket("ws://lavue.test:2346");


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
      timer: "", // 定时器
      value: "",
      mergeStatus: 0, // 1: 删除了数据 2：新增了数据 3
      isViewEdit: 0,
      viewEditValue: '开启实时编辑',
      synData: '同步数据',
    }
  },

  methods: {
    start() {
      // this.timer = setInterval(this.valChange, 2000);
      this.valChange()
    },
    valChange() {
      console.log("发送的数据:" + this.value)
      ws.send(this.value)
      ws.onmessage = (e) => {  // 接受来自服务端的消息
        if (e.data !== "{\"type\":\"@heart@\"}") {

          if (this.mergeStatus === 1) {
            this.myers(e.data, this.value)
            this.mergeStatus = 0;
          } else if (this.mergeStatus === 2) {
            this.myers(this.value, e.data)
            this.mergeStatus = 0;
          } else {
            this.myers(this.value, e.data)
          }
        }
      }
    },
    myers(stra, strb) {
      let n = stra.length
      let m = strb.length
      let v = {
        '1': 0
      }
      let vs = {
        '0': {'1': 0}
      }
      let d
      loop:
          for (d = 0; d <= n + m; d++) {
            let tmp = {}
            for (let k = -d; k <= d; k += 2) {
              let down = k === -d || k !== d && v[k + 1] > v[k - 1]
              let kPrev = down ? k + 1 : k - 1
              let xStart = v[kPrev]
              let yStart = xStart - kPrev
              let xMid = down ? xStart : xStart + 1
              let yMid = xMid - k
              let xEnd = xMid
              let yEnd = yMid
              while (xEnd < n && yEnd < m && stra[xEnd] === strb[yEnd]) {
                xEnd++
                yEnd++
              }
              v[k] = xEnd
              tmp[k] = xEnd
              if (xEnd === n && yEnd === m) {
                vs[d] = tmp
                let snakes = this.solution(vs, n, m, d)
                this.printRes(snakes, stra, strb)
                break loop
              }
            }
            vs[d] = tmp
          }
    },
    solution(vs, n, m, d) {
      let snakes = []
      let p = {x: n, y: m}
      for (; d > 0; d--) {
        let v = vs[d]
        let vPrev = vs[d - 1]
        let k = p.x - p.y
        let xEnd = v[k]
        let yEnd = xEnd - k
        let down = k === -d || k !== d && vPrev[k + 1] > vPrev[k - 1]
        let kPrev = down ? k + 1 : k - 1
        let xStart = vPrev[kPrev]
        let yStart = xStart - kPrev
        let xMid = down ? xStart : xStart + 1
        let yMid = xMid - k
        snakes.unshift([xStart, xMid, xEnd])
        p.x = xStart
        p.y = yStart
      }
      return snakes
    },
    printRes(snakes, stra, strb) {
      let consoleStr = ''
      let yOffset = 0
      snakes.forEach((snake, index) => {
        let s = snake[0]
        let m = snake[1]
        let e = snake[2]
        let large = s
        if (index === 0 && s !== 0) {
          for (let j = 0; j < s; j++) {
            consoleStr += `${stra[j]}`
            yOffset++
          }
        }
// 刪除
        if (m - s === 1) {
          this.mergeStatus = 1;
          large = m
// 添加
        } else {
          consoleStr += `${strb[yOffset]}`
          console.log("新添加的: " + `${strb[yOffset]}`)
          this.mergeStatus = 2;
          yOffset++
        }
// 不變
        for (let i = 0; i < e - large; i++) {
          consoleStr += `${stra[large + i]}`
          console.log("原来的: " + `${stra[large + i]}`)
          this.mergeStatus = 3;

          yOffset++
        }

        if (this.mergeStatus !== 3) {
          console.log("最后输出的:" + consoleStr)
          this.form.body = consoleStr
        }
        this.mergeStatus = 0;
      })
    },

    storeProfileInformation(props) {

      this.form.post(route('articles.store'), {
        errorBag: 'storeProfileInformation',
        preserveScroll: true,
      });
    },
    // 绑定@imgAdd event
    $imgAdd(pos, $file) {
      let vm = this;
      // 第一步.将图片上传到服务器.
      let formData = new FormData();
      formData.append('image', $file);
      axios({
        url: route('file-system.upload-image'),
        method: 'post',
        data: formData,
        headers: {'Content-Type': 'multipart/form-data'},
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
    },

    $change: function (value, render) {
      console.log(value)
      this.value = value
    },
    $save: function (value, render) { // ctrl+s 保存事件
      // this.value = value
      // this.start()
    },
    $viewEdit: function (){

      if(this.isViewEdit === 1){
        this.isViewEdit = 0
        this.viewEditValue = '开启实时编辑'
        clearInterval(this.timer)
      }else{
        //开启定时器
        this.viewEditValue = '关闭实时编辑'
        this.timer = setInterval(this.valChange, 1350)
        this.isViewEdit = 1
      }
    }
  },


})


</script>
