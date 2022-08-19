<template>
    <v-app>
        <v-container>
            
            <v-form @submit.prevent="createQuestion">
            

                <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
                ></v-text-field>

                <v-select
                    :items="categories"
                    v-model="form.category_id"
                    item-text="name"
                    item-value="id"
                    label="Solo field"
                ></v-select>

                <v-textarea v-model="form.body" />

                <v-btn type="submit" color="green">
                    Create
                </v-btn>

            </v-form>


        </v-container>
    </v-app>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    title: null,
                    category_id: null,
                    body: '',
                },
                categories: {},
                errors: ""
            }
        },
        created() {
            axios.get('/api/category/')
            .then( (res)=>{
                this.categories = res.data.data;
            })
            .catch( error => this.errors = error.ressponse.data.error )
        },
        methods: {

            createQuestion() {
                axios.post('/api/question/', this.form)
                .then( (res)=> {
                    let question = res.data.data;
                    this.$router.push(question.path)
                } )
                .catch( error => this.errors = error.response.data.message );
            }
        }
    }
</script>


<style>

</style>