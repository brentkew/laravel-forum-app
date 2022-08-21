<template>
    <v-container>
        <div v-if="content">
            <reply-component v-for="(reply, index) in content" :key="reply.id" :reply="reply" :index="index"></reply-component>
        </div>
    </v-container>
</template>



<script>
import ReplyComponent from './Reply.vue';
export default {
    components: {
        ReplyComponent
    },
    props: ['question'],
    data() {
        return {
            content: this.question.replies
        }
    },
    created() {
        this.listen();
    },
    methods: {

        listen() {
            EventBus.$on('newReply', (reply)=>{
                this.content.unshift(reply);
                window.scroll(0,0);
            });

            EventBus.$on('deleteReply',(index)=>{

                axios.delete(`/api/question/${this.question.slug}/reply/${this.content[index].id}`)
                .then( (res)=>{
                    this.content.splice(index,1);
                })

                
            });
        }
    }
}
</script>


<style>

</style>