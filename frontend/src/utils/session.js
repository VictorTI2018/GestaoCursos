import Vue from 'vue'
import VueSession from 'vue-session'

const options = {
    persist: true
}

Vue.use(VueSession, options)

const session = Vue.prototype.$session

export default session