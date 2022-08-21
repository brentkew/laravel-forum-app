<template>
    <v-container>
        <v-card class="app-sidebar">
            <v-card-title>
                {{ reply.user }} said {{ reply.created_at }}

                <v-spacer></v-spacer>

                <like-component :data="reply"></like-component>

            </v-card-title>
            <v-divider></v-divider>

            <v-card-text v-text="reply.reply"></v-card-text>

            <v-divider></v-divider>

            <v-card-actions v-if="own">
                <v-btn type="button" color="blue">
                    Edit
                </v-btn>
                <v-btn type="button" color="blue" @click="deleteReply(index)">
                    Delete
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>
import LikeComponent from '../likes/LikeComponent.vue';
export default {
    props: ['reply','index'],
    components: {
        LikeComponent
    },
    computed: {
        own() {
            return User.own(this.reply.user_id)
        }
    },
    methods: {

        deleteReply(index){
            EventBus.$emit("deleteReply",this.index);
        }
    }
}
</script>