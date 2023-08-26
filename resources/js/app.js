import './bootstrap';
import * as bootstrap from 'bootstrap';
import {createApp} from "vue/dist/vue.esm-bundler.js";

import Example from "./components/Example.vue";
import EmptyRolesIcon from "./components/icons/EmptyRolesIcon.vue";
import EditIcon from "./components/icons/EditIcon.vue";
import EyeIcon from "./components/icons/EyeIcon.vue";
import EllipsisIcon from "./components/icons/EllipsisIcon.vue";
import TrashIcon from "./components/icons/TrashIcon.vue";


const app = createApp({});
app.component('example', Example);
app.component('empty-roles-icon', EmptyRolesIcon);
app.component('edit-icon', EditIcon);
app.component('eye-icon', EyeIcon);
app.component('ellipsis-icon', EllipsisIcon);
app.component('trash-icon', TrashIcon);

app.mount("#app");
