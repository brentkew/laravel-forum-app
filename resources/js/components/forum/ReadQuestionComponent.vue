<template>
    <v-card class="mx-auto my-12">

        <div v-if="question">
            <edit-question :question="question" v-if="editing"></edit-question>
            <show-question :question="question" v-else></show-question>        
        </div>

   </v-card>
</template>

<script>
import ShowQuestion from './ShowQuestion.vue';
import EditQuestion from './EditQuestionComponent.vue';

export default {
    components: {
        ShowQuestion, EditQuestion
    },
    data() {
        return {
            question: {},
            editing: false
        }
    },
    mounted() {
        this.listenEvents();
        this.getQuestion();
    },
    methods: {
        listenEvents() {
            EventBus.$on('editQuestion', ()=> {
                this.editing = true;
            });

            EventBus.$on('cancelEditing', ()=> {
                this.editing = false;
            });
        },
        getQuestion() {
            axios.get(`/api/question/${this.$route.params.slug}`)
            .then( (res)=> {
                this.question = res.data.data
            }).catch( error => error.response.data );
        },
    }
}
</script>

<style>

</style>