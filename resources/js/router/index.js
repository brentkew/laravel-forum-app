import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import HomeComponent from '../components/HomeComponent.vue';
import AboutusComponent from '../components/AboutusComponent.vue';
import PortfolioComponent from '../components/PortfolioComponent.vue';
import ForumComponent from '../components/forum/ForumComponent.vue';
import CategoryComponent from '../components/CategoryComponent.vue';
import AskQuestionComponent from '../components/AskQuestionComponent.vue';
import LoginComponent from '../components//auth/LoginComponent';
import LogoutComponent from '../components//auth/LogoutComponent.vue';
import SignupComponent from '../components//auth/SignupComponent';
import ReadQuestionComponent from '../components/forum/ReadQuestionComponent.vue';


const routes = [
    { path: "/", component: HomeComponent },
    { name: "forum", path: "/forum", component: ForumComponent },
    { name: "category", path: "/category", component: CategoryComponent },
    { name: "ask-question", path: "/ask-question", component: AskQuestionComponent },
    { name: "question-details", path: "/question/:slug", component: ReadQuestionComponent },
    { name: "about-us", path: "/about-us", component: AboutusComponent },
    { name: "portfolio", path: "/portfolio", component: PortfolioComponent },
    { name: "login", path: "/login", component: LoginComponent },
    { name: "logout", path: "/logout", component: LogoutComponent },
    { name: "signup", path: "/signup", component: SignupComponent },
    
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
});


export default router;