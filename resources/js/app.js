require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import VueSweetalert2 from 'vue-sweetalert2'

Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);

import App from './components/App.vue';
import ListBarang from './components/ListBarang.vue';
import ListKaryawan from './components/ListKaryawan.vue';
import ListPermintaan from './components/ListPermintaan.vue';
import CreatePermintaan from './components/CreatePermintaan.vue';
import DetailPermintaan from './components/DetailPermintaan.vue';

const routes = [
    {
        name : 'home',
        path : '/',
        component : ListPermintaan
    },
    {
        name : 'barang',
        path : '/barang',
        component : ListBarang
    },
    {
        name : 'karyawan',
        path : '/karyawan',
        component : ListKaryawan
    },
    {
        name : 'create',
        path : '/create-permintaan',
        component : CreatePermintaan
    },
    {
        name : 'show',
        path : '/show-detail',
        component : DetailPermintaan
    },
];

const router = new VueRouter({mode:'history', routes:routes});
const app = new Vue(Vue.util.extend({router}, App)).$mount('#app');
