<script setup>

</script>
<template>
  <div>

    <button type="submit"
            class="px-2 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"
            :class="{'lg:hidden':isDesktopIconOnly}"
            v-if="as == 'button'">
      <slot></slot>


    </button>


    <a :href="href"
       class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"
       v-else-if="as =='a'">
      <slot></slot>
    </a>

    <Link :href="href"
          class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"
          v-else>
      <slot></slot>
    </Link>
  </div>
</template>

<script>
import {defineComponent} from 'vue';
import {Link} from '@inertiajs/inertia-vue3';


export default defineComponent({
  components: {
    Link,
  },
  props: ['href', 'as']
})
</script>
