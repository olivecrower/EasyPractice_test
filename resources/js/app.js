import { library } from '@fortawesome/fontawesome-svg-core';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import Vue from 'vue'
import store from './store/index.js'

window.Vue = Vue;
library.add(fas)
Vue.component('fa', FontAwesomeIcon)
Vue.component("app", require("./components/App.vue").default);
require("./bootstrap.js");

const app = new Vue({
    el: "#app",
    store: store
});
