<template>
    
    <v-card>

        <v-textarea v-model="body" />
        <v-card-actions>
            <v-btn type="button" color="blue" @click="createReply">
                Reply
            </v-btn>
        </v-card-actions>
    </v-card>


</template>


<script>
export default {

    props: ['slug'],
    data() {
        return {
            body: null
        }
    },
    methods: {
        createReply() {

            axios.post(`/api/question/${this.slug}/reply`,{body: this.body})
            .then( (res)=>{
                this.body = "";
                EventBus.$emit('newReply', res.data.data);
            });


        }
    }
    
}
</script>


<style>

</style>