<template>
    <v-container>
        <v-form @submit.prevent="editQuestion">


            <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
                ></v-text-field>

            <v-textarea v-model="form.body" ref="markdownEditor" />

             <v-btn type="submit" color="green">
                Edit
            </v-btn>
            <v-btn type="submit" color="green" @click="cancelEditing">
                Cancel
            </v-btn>

        </v-form>
    </v-container>
</template>

<script>
export default {
    props: ['question'],
    data() {
        return {
            form: {
                title: null,
                body: null
            }
        }
    },
    created() {
        this.form = this.question;
    },
    methods: {
        editQuestion(){
            axios.patch(`/api/question/${this.$route.params.slug}`, this.form)
            .then( (res)=> {
                this.cancelEditing();
            }).catch( error => error.response.data );
        },
        cancelEditing() {
            EventBus.$emit('cancelEditing');
        }
    }
}
</script>

<style>

</style>