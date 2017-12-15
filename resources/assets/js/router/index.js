import Vue from 'vue'
import VueRouter from 'vue-router'
import Register from '../modules/membership/Register.vue'
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
    }
  ]
});

export default router
