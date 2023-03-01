require('bootstrap');

window.axios = require('axios');

// window.Vue = require('vue');
import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import PageHome from './pages/PageHome';
import PageOrder from './pages/PageOrder';
import PageDishes from './pages/PageDishes';
import PageCategories from './pages/PageCategories';
import vueBraintree from 'vue-braintree';

Vue.use(vueBraintree);
Vue.use(VueRouter);


const routes = [
    {
        path: '/',
        name: 'home',
        component: PageHome,
    },

    {
        path: '/order',
        name: 'order',
        component: PageOrder,
    },

    {
        path: '/dishes/:slug',
        name: 'dishes-user',
        component: PageDishes,
        props:true,
    },

    {
        path: '/categories/:slug',
        name: 'categories',
        component: PageCategories,
        props:true,
    },
]

const router = new VueRouter({
    mode: 'hash',
    routes,
});

new Vue({
    el: '#root',
    render: h => h(App),
    router, //equivale a scrivere router: router perché abbiamo lo stesso nome della variabile

})
