import Vue from 'vue'
import VueAxios from 'vue-axios'
import axios from 'axios'
import axiosCancel from 'axios-cancel'
import session from './session'

const http = axios.create({
    baseURL: 'http://localhost:8000'
})

Vue.use(VueAxios, http)
axiosCancel(http)

http.interceptors.request.use((config) => {
    let token = session.get('token')
    if (token) {
        config.headers['Authorization'] = `Bearer ${token}`
    }
    return config
}, error => {
    return Promise.reject(error)
})

export default http