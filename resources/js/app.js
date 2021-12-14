require('./bootstrap');

// window.Vue = require('vue').default;
import Vue from 'vue';
import 'bootstrap-icons/font/bootstrap-icons.css'

import router from './router/index'

Vue.component('app-component', require('./components/App.vue').default);

const app = new Vue({
    el: '#app',
    router: router
});
