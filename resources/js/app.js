require('./bootstrap');



import { createApp } from 'vue';

import $ from "jquery";
import { configure, defineRule } from "vee-validate";



import DataEmpty from './components/common/dataEmpty.vue';


import NewsCreate from './components/admin/new/create.vue';
import NewsEdit from './components/admin/new/edit.vue';



const app = createApp({});





app.component("news-create", NewsCreate);
app.component("news-edit", NewsEdit);


app.component("data-empty", DataEmpty);


app.mount("#app");