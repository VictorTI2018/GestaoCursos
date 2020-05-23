import Vue from 'vue'
import VueRouter from 'vue-router'
import session from '../utils/session'
import Home from '../views/Home.vue'

import Auth from '../views/Login/Auth.vue'

import ListaCursos from '../views/Cursos/Lista.vue'
import RegistrarCursos from '../views/Cursos/Register.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/auth',
    component: Auth,
    name: 'auth',
    meta: { title: 'Auth', public: true }
  },
  {
    path: '/',
    component: Home,
    children: [
      {
        path: '/',
        redirect: '/cursos'
      },
      {
        path: '/cursos',
        name: 'lista',
        component: ListaCursos,
        meta: { title: 'Cursos' }
      },
      {
        path: '/cursos-register',
        name: 'register',
        component: RegistrarCursos,
        meta: { title: 'Registrar Cursos' }
      }
    ]
  }
]

const router = new VueRouter({
  routes,
  mode: 'history'
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title 
  checkSession(next, to)
})

const checkSession = (next, to) => {
  if (session.exists()) {
    if (to.name === 'auth') {
      next({ path: '/' })
    } else {
      next()
    }
  } else if (!to.meta.public) {
    next({ name: 'auth' })
  } else {
    next()
  }
}

export default router
