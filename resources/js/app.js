
require('./bootstrap');
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import stores from './store'
import { darkModeKey } from '@/config.js'
import router from './router'


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

const localStorageDarkModeValue = localStorage.getItem(darkModeKey)

if ((localStorageDarkModeValue === null && window.matchMedia('(prefers-color-scheme: dark)').matches) || localStorageDarkModeValue === '1') {
    stores.dispatch('darkMode')
}

router.beforeEach(to => {
    stores.dispatch('asideMobileToggle', false)
    stores.dispatch('asideLgToggle', false)
})

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin}) {
        return createApp({ render: () => h(app, props) })
            .use(plugin,stores,router)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
