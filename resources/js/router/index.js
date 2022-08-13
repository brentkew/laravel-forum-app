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


const routes = [
    {
        path: "/",
        component: HomeComponent
    },
    {
        name: "Forum",
        path: "/forum",
        component: ForumComponent
    },
    {
        name: "Category",
        path: "/category",
        component: CategoryComponent
    },
    {
        name: "Question",
        path: "/question",
        component: QuestionComponent
    },
    {
        name: "AboutUs",
        path: "/about-us",
        component: AboutusComponent
    },
    {
        name: "Portfolio",
        path: "/portfolio",
        component: PortfolioComponent
    },
    {
        name: "Login",
        path: "/login",
        component: LoginComponent
    },
    
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
});


export default router;