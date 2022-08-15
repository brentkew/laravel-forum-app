<template>
    <div>      
        
        <router-link
        v-for="item in items" :key="item.title" 
        :to="item.to" 
        v-if="item.show">
            <v-btn text>{{ item.title }}</v-btn>
        </router-link>
    ,
    </div>
</template>


<script>
export default {
    created() {
        EventBus.$on('logout', ()=> {
            User.loggedOut();
        });
    },
    data() {
        return {
            items: [
                {title: 'Forum', to: '/forum', show: true},
                {title: 'Ask Question', to: '/question', show: User.loggedIn()},
                {title: 'Category', to: '/category', show: User.loggedIn()},
                {title: 'Login', to: '/login', show: !User.loggedIn()},
                {title: 'Logout', to: '/logout', show: User.loggedIn()},
            ]
        }
    }
}
</script>