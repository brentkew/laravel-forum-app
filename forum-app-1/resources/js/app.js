// VUE Version 2 Application

require('./bootstrap');

window.Vue = require('vue').default;


import Vue from 'vue';
import './components'; // Include all components files
import Vuetify from './plugins/vuetify';
import router from './router';
import User from './Helpers/User';



window.User =  User;
window.EventBus = new Vue();

const app = new Vue({
    vuetify: new Vuetify(),
    el: '#app',
    router
});