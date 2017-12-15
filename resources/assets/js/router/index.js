import Vue from 'vue'
import VueRouter from 'vue-router'
import Register from '../modules/membership/Register.vue'
import Login from '../modules/membership/Login.vue'
import Welcome from '../modules/welcome.vue';
Vue.use(VueRouter);

const router = new VueRouter({
  routes: [
    {
        path: '*',
        redirect: '/'
    },
    {
        path: '/',
        name: 'Welcome',
        component: Welcome
    },
    {
      path: '/register',
      component: Register
    },
    {
      path: '/login',
      component: Login
    },
    {
      path: '/home',
      component: Login
    }
  ]
});

export default router
