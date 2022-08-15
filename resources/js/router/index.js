// import { createRouter, createWebHistory } from "vue-router";

// import LoginComponent from '../components//login/LoginComponent';
// import AboutusComponent from '../components/AboutusComponent.vue';
// import PortfolioComponent from '../components/PortfolioComponent.vue';

// const routes = [
//     {
//         name: "Example",
//         path: "/",
//         component: Example
//     },
//     {
//         name: "AboutUs",
//         path: "/about-us",
//         component: AboutUs
//     },
//     {
//         name: "Portfolio",
//         path: "/portfolio",
//         component: Portfolio
//     },
//     {
//         name: "Login",
//         path: "/login",
//         component: Login
//     },
    
// ];


// const router = createRouter({
//     routes,
//     history: createWebHistory(process.env.APP_URL)
// });

// export default router;



// VUE ROUTER 3
// =========================
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import HomeComponent from '../components/HomeComponent.vue';
import AboutusComponent from '../components/AboutusComponent.vue';
import PortfolioComponent from '../components/PortfolioComponent.vue';
import ForumComponent from '../components/ForumComponent.vue';
import CategoryComponent from '../components/CategoryComponent.vue';
import QuestionComponent from '../components/QuestionComponent.vue';
import LoginComponent from '../components//login/LoginComponent';
import LogoutComponent from '../components//login/LogoutComponent.vue';
import SignupComponent from '../components//login/SignupComponent';


const routes = [
    {
        path: "/",
        component: HomeComponent
    },
    {
        name: "forum",
        path: "/forum",
        component: ForumComponent
    },
    {
        name: "category",
        path: "/category",
        component: CategoryComponent
    },
    {
        name: "question",
        path: "/question",
        component: QuestionComponent
    },
    {
        name: "about-us",
        path: "/about-us",
        component: AboutusComponent
    },
    {
        name: "portfolio",
        path: "/portfolio",
        component: PortfolioComponent
    },
    {
        name: "login",
        path: "/login",
        component: LoginComponent
    },
    {
        name: "logout",
        path: "/logout",
        component: LogoutComponent
    },
    {
        name: "signup",
        path: "/signup",
        component: SignupComponent
    },
    
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
});


export default router;