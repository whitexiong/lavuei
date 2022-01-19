<script setup>
import {computed} from 'vue'
import {
  mdiAccountCircle, mdiAlertCircle,
  mdiBookOpen,
  mdiDesktopMac,
  mdiEyedropper, mdiGithub, mdiLock,
  mdiMenu, mdiMonitorShimmer, mdiResponsive,
  mdiSquareEditOutline,
  mdiTable,
  mdiTelevisionGuide, mdiViewList
} from '@mdi/js'
import AsideMenuList from '@/Components/AsideMenuList.vue'
import NavBarItem from '@/Components/NavBarItem.vue'
import Icon from '@/Components/Icon.vue'
import stores from '@/store'

const st = 'mdiDesktopMac'
defineProps({
  menu: {
    type: Array,
    default: () => [
      'General',
      [
        {
          to: '/',
          icon: 'mdiDesktopMac',
          label: '仪表盘'
        }
      ],
      '菜单',
      [
        {
          label: '用户管理',
          icon: mdiTable,
          // updateMark: true,
          menu: [
            {
              href: route('users.index'),
              active: route().current('users.*'),
              label: '列表',
              icon: mdiBookOpen,
            },
          ]
        },
        {
          to: '/forms',
          label: '菜单管理',
          icon: mdiSquareEditOutline
        },
        {
          label: '文章管理',
          icon: mdiTelevisionGuide,
          menu: [
            {
              href: route('articles.index'),
              active: route().current('article.*'),
              label: '列表',
              icon: mdiBookOpen,
            },
            {
              href: route('articles.create'),
              label: '创建文章',
              icon: mdiEyedropper,
            }
          ]
        },
        {
          to: '/responsive',
          label: 'Responsive',
          icon: mdiResponsive
        },
        {
          to: '/profile',
          label: 'Profile',
          icon: mdiAccountCircle
        },
        {
          to: '/login',
          label: 'Login',
          icon: mdiLock
        },
        {
          to: '/error',
          label: 'Error',
          icon: mdiAlertCircle
        },
        {
          label: 'Submenus',
          subLabel: 'Submenus Example',
          icon: mdiViewList,
          menu: [
            {
              label: 'Sub-item One'
            },
            {
              label: 'Sub-item Two'
            }
          ]
        }
      ],
      'About',
      [
        {
          href: 'https://justboil.me/tailwind-admin-templates/vue-dashboard/',
          label: 'Premium version',
          icon: mdiMonitorShimmer,
          target: '_blank'
        },
        {
          href: 'https://github.com/justboil/admin-one-vue-tailwind',
          label: 'GitHub',
          icon: mdiGithub,
          target: '_blank'
        }
      ]

    ]
  }
})

const isFullScreen = computed(() => stores.state.isFullScreen)

const isAsideMobileExpanded = computed(() => stores.state.isAsideMobileExpanded)

const isAsideLgActive = computed(() => stores.state.isAsideLgActive)

const asideLgClose = () => {
  stores.dispatch('asideLgToggle', false)
}

const menuClick = (event, item) => {
  //
}
</script>

<template>
  <aside
      v-show="!isFullScreen"
      id="aside"
      class="w-60 fixed top-0 z-40 h-screen bg-gray-800 transition-position lg:left-0 dark:border-r dark:border-gray-800 dark:bg-gray-900"
      :class="[ isAsideMobileExpanded ? 'left-0' : '-left-60', isAsideLgActive ? 'block' : 'lg:hidden xl:block' ]"
  >
    <div class="flex flex-row w-full bg-gray-900 text-white flex-1 h-14 items-center">
      <nav-bar-item
          type="hidden lg:flex xl:hidden"
          active-color="text-white"
          active
          @click="asideLgClose"
      >
        <icon
            :path="mdiMenu"
            class="cursor-pointer"
            size="24"
        />
      </nav-bar-item>
      <div class="flex-1 px-3">
        <span>Admin</span> <b class="font-black">One</b>
      </div>
    </div>
    <div>
      <template v-for="(menuGroup, index) in menu">
        <p
            v-if="typeof menuGroup === 'string'"
            :key="`a-${index}`"
            class="p-3 text-xs uppercase text-gray-400"
        >
          {{ menuGroup }}
        </p>
        <aside-menu-list
            v-else
            :key="`b-${index}`"
            :menu="menuGroup"
            @menu-click="menuClick"
        />
      </template>
    </div>
  </aside>
</template>
