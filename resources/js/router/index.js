import Vue from "vue";
import VueRouter from "vue-router";

import Dashboard from '../components/pages/Dashboard.vue';

Vue.use(VueRouter);
const routes = [
    {
        name: 'dashboard',
        path: '/',
        component: Dashboard
    }
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

export default router;