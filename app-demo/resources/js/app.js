import '../css/app.css'

import {createApp, h} from 'vue';
import {createInertiaApp, Link} from '@inertiajs/inertia-vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {InertiaProgress} from '@inertiajs/progress';
import Layout from "./Shareds/Layout";

createInertiaApp({
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .component('Link', Link)
            .component('Layout', Layout)
            .mount(el)
    },

    title: (title) => 'My App: ' + title
});

InertiaProgress.init({
    color: '#29d',
    showSpinner: true
})
