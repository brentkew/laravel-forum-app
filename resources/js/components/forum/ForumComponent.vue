<template>
  <v-container class="grey lighten-5">
    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
    <v-row>
      
      <v-col cols="12" md="8" >
        <question-card-component v-for="question in questions" :key="question.key" :question="question"></question-card-component>
      </v-col>


      <v-col cols="6" md="4">
        <v-card class="pa-2" outlined tile>
          <app-sidebar></app-sidebar>
        </v-card>
      </v-col>
    </v-row>

  </v-container>
</template>

<script>
import QuestionCardComponent from './QuestionCardComponent.vue';
import AppSidebar from './AppSidebar.vue';
    export default {
        components:{ QuestionCardComponent, AppSidebar },
        created() {
            this.getAllQuestion();
        },
        data() {
            return {
                questions: {}
            }
        },
        methods: {

            getAllQuestion() {
                axios.get('/api/question')
                .then( (res)=> {
                    this.questions = res.data.data
                }).catch( error => error.response.data );
            }
            
        }

    }
</script>
