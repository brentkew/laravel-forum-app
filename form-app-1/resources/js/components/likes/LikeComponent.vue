<template>
    <v-card>

        <v-btn @click="like" v-if="liked"> Unlike </v-btn>

        <v-btn @click="like" v-else> Like </v-btn> {{ this.count }}
        
    </v-card>
</template>


<script>
export default {
    props: ['data'],
    data() {
        return {
            liked: this.data.liked,
            count: this.data.like_count
        }
    },
    methods: {
        like() {
            if(User.loggedIn()) {
                this.liked ? this.decrement() : this.increment();
                this.liked = !this.liked;
            }
            
        },
        decrement() {
            axios.delete(`/api/like/${this.data.id}`)
            .then( (res)=>{
                --this.count;
            });
        },
        increment() {
            axios.post(`/api/like/${this.data.id}`) 
            .then( (res)=>{
                ++this.count;
            });
            
        },
    }
}
</script>


<style>

</style>