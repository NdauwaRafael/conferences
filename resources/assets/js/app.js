require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueResource from 'vue-resource'
import Workshop from './workshop.vue'
import router from './router'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(VueResource)
Vue.use(ElementUI);
const app = new Vue({
    el: '#app',
    template: `<Workshop></Workshop>`,
    components: {Workshop},
    router
});
