<template>
  <jet-nav></jet-nav>

  <div class="dark:bg-gray-500">
    <div
        class="supports-backdrop-blur:bg-white/95 mx-auto w-96 flex shadow-xl shadow-slate-700/10 ring-1 ring-gray-900/5">
      <div class="w-full max-w-md p-8 space-y-3 dark:border border-gray-100 rounded-xl bg-coolGray-50 text-coolGray-800 mx-auto">

        <h1
            class="dark:text-gray-200  mb-4 text-3xl text-center sm:text-4xl tracking-tight text-gray-900 font-extrabold"><font
            style="vertical-align: inherit;"><font style="vertical-align: inherit;">注册</font></font>
        </h1>

        <form novalidate="" action="" class="space-y-6 ng-untouched ng-pristine ng-valid">

          <div class="space-y-1 text-sm">
            <label for="username" class="block text-coolGray-600 dark:text-gray-200">手机号</label>
            <input type="text" name="username" id="username" placeholder="Username"
                   class="w-full px-4 py-3 rounded-md border-coolGray-300 bg-coolGray-50 text-coolGray-800">
          </div>


          <div class="space-y-1 text-sm">
            <label for="password" class="block text-coolGray-600 dark:text-gray-200">验证码</label>
            <input type="password" name="password" id="password" placeholder="Password"
                   class="w-full px-4 py-3 rounded-md border-coolGray-300 bg-coolGray-50 text-coolGray-800">

          </div>
          <button class="block w-full p-3 text-center rounded-sm text-coolGray-50 bg-indigo-600 dark:text-gray-200">注册
          </button>
        </form>
        <p class="text-xs text-center sm:px-6 text-coolGray-600">已有账号？
          <a href="#" class="underline text-coolGray-800 dark:text-gray-200">登录</a>
        </p>
      </div>
    </div>
  </div>
  <jet-footer/>
</template>
<script>

import {defineComponent} from 'vue'
import JetNav from '@/Layouts/Nav.vue'
import JetFooter from '@/Layouts/Footer.vue'


export default defineComponent({
  components: {
    JetNav,
    JetFooter,
  },
  methods: {},
})

</script>

