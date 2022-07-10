import "../css/app.css";
import { createApp, h } from "vue";
import { InertiaProgress } from "@inertiajs/progress";
import PrimeVue from "primevue/config";
import Button from "primevue/button";
import Toast from "primevue/toast";
import ToastService from "primevue/toastservice";
import ConfirmationService from "primevue/confirmationservice";
import InputText from "primevue/inputtext";
import "primevue/resources/themes/saga-blue/theme.css";
import "primevue/resources/primevue.min.css";
import 'primeicons/primeicons.css';
import { createInertiaApp, Link, Head } from "@inertiajs/inertia-vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import Layout from "./Shareds/Layout";

createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob("./Pages/**/*.vue")),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(PrimeVue)
      .use(ToastService)
      .use(ConfirmationService)
      .component("Link", Link)
      .component("Layout", Layout)
      .component("Head", Head)
      .component("Button", Button)
      .component("InputText", InputText)
      .component("Toast", Toast)
      .mount(el);
  },

  title: (title) => "My App: " + title
});

InertiaProgress.init({
  color: "#29d",
  showSpinner: true
});
