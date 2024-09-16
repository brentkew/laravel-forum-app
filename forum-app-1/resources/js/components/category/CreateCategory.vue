<template>
    <v-container>
        <v-form @submit.prevent="submit" class="mb-3">
        

            <v-text-field
            v-model="form.name"
            label="Category Name"
            type="text"
            required
            ></v-text-field>


            <v-btn type="submit" v-if="editSlug" @click="update">Update</v-btn>
            <v-btn type="submit" v-else>Create</v-btn>


            <v-btn type="button" @click="cancelEditing">Cancel</v-btn>

        </v-form>


        <v-card class="mx-auto" max-width="" tile >
            <v-toolbar color="indigo" dark dense>
                <v-toolbar-title>
                    Categories
                </v-toolbar-title>
            </v-toolbar>
            <v-list class="m-0 p-0">
            <div v-for="(category, index) in categories" :key="category.id" dense class="m-0 p-0">
                <v-list-item >
                    <v-list-item-content class="p-0 m-0">
                        <v-list-item-title class="float-left">{{ category.name }}</v-list-item-title>
                        <div class="float-right">
                            <v-btn @click="edit(index)">Edit</v-btn>
                            <v-btn @click="deleteCategory(category.slug,index)">Delete</v-btn>
                        </div>                        
                    </v-list-item-content>
                </v-list-item>
                    <v-divider class="m-0 p-0"></v-divider>
                </div>
            </v-list>
        </v-card>

    </v-container>

</template>

<script>
export default {
    data() {
        return {
            form: {
                name: null
            },
            categories: {},
            editSlug: null
        }
    },
    created() {
        this.getCategories();
    },
    methods: {
        submit() {
            this.editSlug ? this.update() : this.create();
        },
        create() {
            axios.post('/api/category/', this.form)
            .then( (res)=>{
                this.categories.unshift(res.data.data)
                this.form.name = "";
            })
            .catch( error=> console.log(error.response.data.error) )
        },
        update() {
            axios.patch(`/api/category/${this.editSlug}`,this.form)
            .then( (res)=>{
                this.categories.unshift(res.data.data)
                this.form.name = "";
            })
            .catch( error=> console.log(error.response.data.error) )
        },
        deleteCategory(categorySlug,index) {
            axios.delete(`/api/category/${categorySlug}`)
            .then( res => this.categories.splice(index,1))
        },
        getCategories() {
            axios.get('/api/category/')
            .then( (res)=>{
                this.categories = res.data.data;
            })
            .catch( error => console.log(error.response.data.error) )
        },
        edit(index) {
            this.form.name = this.categories[index].name;
            this.editSlug = this.categories[index].slug;
            this.categories.splice(index,1);
        },
        cancelEditing() {
            this.editSlug = null;
            this.form.name = null;
        }
    }

}
</script>
