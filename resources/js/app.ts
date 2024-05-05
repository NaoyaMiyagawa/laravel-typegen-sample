import "./bootstrap";
import "../css/app.css";

import { createApp, h, DefineComponent } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => {
    const allPages = import.meta.glob<DefineComponent>([
      "./Pages/**/*.vue",
      "../../app-modules/*/resources/js/Pages/**/*.vue",
    ]);

    const module = name.includes("::")
      ? name.split("::")[0].toLowerCase()
      : null;
    const pagePath = name.split("::").at(-1) || name;
    const pageName = pagePath.split("/").at(-1) || pagePath;

    const pagesDir = module
      ? `../../app-modules/${module}/resources/js/Pages`
      : "./Pages";
    const componentPath = `${pagesDir}/${pagePath}/${pageName}.vue`;

    return resolvePageComponent(componentPath, allPages);
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .mount(el);
  },
  progress: {
    color: "#4B5563",
  },
});
