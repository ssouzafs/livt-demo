import '../css/app.css'

import { createApp, h } from 'vue';
import { createInertiaApp, InertiaLink} from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { InertiaProgress } from '@inertiajs/progress';

createInertiaApp({
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Link', InertiaLink)
            .mount(el)
    },
});

InertiaProgress.init({
    color: '#29d',
    showSpinner: true
})
