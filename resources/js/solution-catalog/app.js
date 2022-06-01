import Vue from 'vue'
import App from './App.vue'
import VueTheMask from 'vue-the-mask'

Vue.use(VueTheMask)

const app = new Vue({
    el: '#solution-catalog',
    render: h => h(App)
})