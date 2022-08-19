// export { default as CardLeftMedia } from "./CardLeftMedia";
import Vue from 'vue';


Vue.component('app-component', require('./AppComponent.vue').default)
Vue.component('home-component', require('./HomeComponent.vue').default)
Vue.component('aboutus-component', require('./AboutusComponent.vue').default)
Vue.component('portfolio-component', require('./PortfolioComponent.vue').default)
Vue.component('category-component', require('./CategoryComponent.vue').default)
Vue.component('ask-question-component', require('./AskQuestionComponent.vue').default)
Vue.component('signup-component', require('./auth/SignupComponent.vue').default)

Vue.component('forum-component', require('../components/forum/ForumComponent.vue').default)