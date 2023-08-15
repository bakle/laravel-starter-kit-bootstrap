import './bootstrap';
import * as bootstrap from 'bootstrap';
import {createApp} from "vue/dist/vue.esm-bundler.js";

import Example from "./components/Example.vue";


const app = createApp({});
app.component('example', Example);

app.mount("#app");
