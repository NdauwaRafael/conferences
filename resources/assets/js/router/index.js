import Vue from 'vue'
import VueRouter from 'vue-router'
import Register from '../modules/membership/Register.vue'
import Login from '../modules/membership/Login.vue'
import Welcome from '../modules/welcome.vue';
import profile from '../components/membership/profile.vue';
import home from '../modules/home/home.vue';
import create from '../modules/workshop/create.vue';
import view from '../modules/workshop/view.vue';
import modify from '../modules/workshop/modify.vue';
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
      component: home,
      children: [
        {
        path:'/create',
        component: create
        },
        {
        path:'/view',
        component: view
        },
        {
        path:'/modify',
        component: modify
        }
      ]
    }
  ]
});

export default router
