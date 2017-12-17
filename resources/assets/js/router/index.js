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
import WorkshopReveal from '../modules/workshop/reveal.vue';
import AddSession from '../modules/workshop/AddSession.vue';
import AddAgenda from '../modules/workshop/AddAgenda.vue';
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
        },
        {
        path:'/view/:id',
        component: WorkshopReveal
        },
        {
        path:'/view/:id/AddSession',
        component: AddSession,
        mete: {mode: 'edit'}
        },
        {
        path:'/view/:id/AddAgenda',
        component: AddAgenda,
        mete: {mode: 'edit'}
        }
      ]
    }
  ]
});

export default router
