require('bootstrap');

window.axios = require('axios');

// window.Vue = require('vue');
import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import PageHome from './pages/PageHome';
import PageOrder from './pages/PageOrder';
import PageDishes from './pages/PageDishes';
import PageDish from './pages/PageDish';

Vue.use(VueRouter)

const router = new VueRouter({
    routes: [

        {
           path: '/',
           component: PageHome,
        },

        {
           path: '/order',
           component: PageOrder,
        },

        {
           path: '/dish',
           component: PageDish,
        },

        {
           path: '/dishes',
           component: PageDishes,
        },
    ]
})

new Vue({
    el: '#root',
    render: h => h(App),
    router //equivale a scrivere router: router perché abbiamo lo stesso nome della variabile
})
