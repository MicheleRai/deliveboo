require('bootstrap');

window.axios = require('axios');

// window.Vue = require('vue');
import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

new Vue({
    el: '#root',
    render: h => h(App),

})
