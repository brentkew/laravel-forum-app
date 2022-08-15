// VUE Version 2 Application

require('./bootstrap');

window.Vue = require('vue').default;


// Include all components files
import './components';

import Vuetify from './plugins/vuetify';
import router from './router';

import User from './Helpers/User';
import Vue from 'vue';
window.User =  User;

window.EventBus = new Vue();


const app = new Vue({
    vuetify: new Vuetify(),
    el: '#app',
    router
});