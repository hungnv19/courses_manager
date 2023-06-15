require('./bootstrap');



import { createApp } from 'vue';

import $ from "jquery";
import { configure, defineRule } from "vee-validate";



import DataEmpty from './components/common/dataEmpty.vue';


import NewsCreate from './components/admin/new/create.vue';
import NewsEdit from './components/admin/new/edit.vue';

import FormLogin from './components/auth/login.vue';
import RegisterClient from './components/auth/registerClient.vue';

import LevelCreate from './components/lecturer/level/create.vue';
import LevelEdit from './components/lecturer/level/edit.vue';


const app = createApp({});





app.component("news-create", NewsCreate);
app.component("news-edit", NewsEdit);

app.component("level-create", LevelCreate);
app.component("level-edit", LevelEdit);


app.component("data-empty", DataEmpty);

app.component("form-login", FormLogin);
app.component("register-client", RegisterClient);


app.mount("#app");