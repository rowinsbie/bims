import { createApp } from "vue";
import { createPinia } from "pinia";

import App from "./App.vue";
import router from "./router";
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import "./assets/main.scss";
// web app icons
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import {library} from "@fortawesome/fontawesome-svg-core";
import {fas} from "@fortawesome/free-solid-svg-icons";
library.add(fas)

const app = createApp(App);
app.component('font-awesome-icon',FontAwesomeIcon);
app.use(createPinia());
app.use(router);

app.mount("#app");
