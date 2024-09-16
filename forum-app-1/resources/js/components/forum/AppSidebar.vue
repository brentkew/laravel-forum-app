<template>
    <v-card class="app-sidebar">
        <v-toolbar color="indigo" dark dense>
            <v-toolbar-title>
                Categories
            </v-toolbar-title>
        </v-toolbar>
        <v-list dense>
                <v-list-item-group color="primary" >
                    <v-list-item v-for="category in categories" :key="category.id">
                    
                    <v-list-item-content>
                        <v-list-item-title v-text="category.name"></v-list-item-title>
                    </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
       
    </v-card>
</template>


<script>
export default {
    data() {
        return {
            categories: {}
        }
    },
    created() {
        this.getCategories();
    },
    methods: {
        getCategories() {
            axios.get('/api/category/')
            .then( (res)=>{
                console.log(res.data.data);
                this.categories = res.data.data;
            })
            .catch( error => console.log(error.response.data.error) )
        }
    }
}
</script>


<style>

</style>