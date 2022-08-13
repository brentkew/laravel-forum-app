// VUE Version 2 Application

require('./bootstrap');

window.Vue = require('vue').default;


// Include all components files
import './components';

import Vuetify from './plugins/vuetify';
import router from './router';

import User from './Helpers/User';
window.User =  User;

console.log(User.id());


const app = new Vue({
    vuetify: new Vuetify(),
    el: '#app',
    router
});