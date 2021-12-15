import Vue from "vue";
import VueRouter from "vue-router";

import Dashboard from '../components/pages/Dashboard.vue';
import Customers from '../components/pages/Customers.vue';
import Events from '../components/pages/Events.vue';

Vue.use(VueRouter);
const routes = [
    { path: '/', component: Dashboard, name: 'dashboard' },
    { path: '/customers', component: Customers, name: 'customers'},
    { path: '/events', component: Events, name: 'events' }
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

export default router;