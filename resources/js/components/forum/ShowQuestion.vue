<template>
<v-container class="grey lighten-5">
    
    <v-card-title class="">
        <div class="headline">
            {{ question.title }}            
        </div>
        <v-btn color="teal" v-if="question.replies_count">
            {{ question.replies_count }} Replies
        </v-btn>

    </v-card-title>

    <v-card-text>
        {{ question.user }} said {{ question.created_at }}      
    </v-card-text>


    <v-card-text v-html="question.body"></v-card-text>          
    <v-divider class="mx-4"></v-divider>
    <v-card-actions v-if="own">
        <v-btn class="ma-2" color="primary" dark @click="editQuestion">
            Edit 
            <v-icon dark right ></v-icon>
        </v-btn> 
        <v-btn class="ma-2" color="primary" dark @click="deleteQuestion">
            Delete 
            <v-icon dark right ></v-icon>
        </v-btn>                   
    </v-card-actions>
</v-container>
</template>
<script>


export default {
    props: ['question'],
    data() {
        return {
            own: User.own(this.question.user_id),
            title: this.question.title
        }
    },
    methods: {
        deleteQuestion() {
            axios.delete(`/api/question/${this.question.slug}`)
            .then( res=> this.$router.push('/forum'))
            .catch( error=> console.log(error.response.data) )
        },
        editQuestion() {
            EventBus.$emit('editQuestion');
        }

    }
}
</script>