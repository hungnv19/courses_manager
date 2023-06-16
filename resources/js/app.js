require('./bootstrap');



import { createApp } from 'vue';

import $ from "jquery";
import { configure, defineRule } from "vee-validate";



import DataEmpty from './components/common/dataEmpty.vue';

import LecturerProfile from './components/lecturer/profile.vue';


import NewsCreate from './components/admin/new/create.vue';
import NewsEdit from './components/admin/new/edit.vue';

import FormLogin from './components/auth/login.vue';
import RegisterClient from './components/auth/registerClient.vue';

import LevelCreate from './components/lecturer/level/create.vue';
import LevelEdit from './components/lecturer/level/edit.vue';

import CourseCreate from './components/lecturer/course/create.vue';
import CourseEdit from './components/lecturer/course/edit.vue';

import CategoryCreate from './components/lecturer/category/create.vue';
import CategoryEdit from './components/lecturer/category/edit.vue';

import LanguageCreate from './components/lecturer/language/create.vue';
import LanguageEdit from './components/lecturer/language/edit.vue';


const app = createApp({});





app.component("course-create", CourseCreate);
app.component("course-edit", CourseEdit);

app.component("category-create", CategoryCreate);
app.component("category-edit", CategoryEdit);

app.component("news-create", NewsCreate);
app.component("news-edit", NewsEdit);

app.component("level-create", LevelCreate);
app.component("level-edit", LevelEdit);

app.component("language-create", LanguageCreate);
app.component("language-edit", LanguageEdit);

app.component("data-empty", DataEmpty);

app.component("lecturer-profile", LecturerProfile);

app.component("form-login", FormLogin);
app.component("register-client", RegisterClient);


app.mount("#app");