import {
    mdiAccountCircle,
    mdiAlertCircle,
    mdiDesktopMac,
    mdiGithub,
    mdiLock,
    mdiMonitorShimmer,
    mdiResponsive,
    mdiSquareEditOutline,
    mdiTable,
    mdiTelevisionGuide,
    mdiViewList,
    mdiBookOpen,
    mdiEyedropper
} from '@mdi/js'


export default [
    'General',
    [
        {
            to: '/',
            icon: mdiDesktopMac,
            label: '仪表盘'
        }
    ],
    '菜单',
    [
        {
            label: '用户管理',
            icon: mdiTable,
            updateMark: true,
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
