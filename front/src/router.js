import Vue from "vue"
import Router from 'vue-router'
import home from './components/HelloWorld.vue'
import Awd from './components/Auth.vue'

Vue.use(Router)

const router = new Router ({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'awd',
      component: Awd
    },
    {
      path: '/hello',
      name: 'home',
      component: home,
    },
  ]
})

export default router