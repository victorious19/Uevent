import Vue from "vue"
import Router from 'vue-router'
import Auth from './components/Auth.vue'
import Home from './components/Home'

Vue.use(Router)

const routes = [
    {
      path: '/Auth',
      component: Auth
    },
    {
      path: '/',
      component: Home,
    },
  ]


// export default router
export default new Router({
  mode: 'history',
  routes
})