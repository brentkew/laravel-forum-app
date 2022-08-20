<template>
  <v-card class="mx-auto my-12">
    
    <v-card-title>
      <router-link :to="question.path">
        {{ question.title }}
      </router-link>
    </v-card-title>
    <v-card-text>
      <div>
          {{ question.body }}
      </div>
    </v-card-text>  
    <v-card-text>
        {{ question.user }} said {{ question.created_at }}      
    </v-card-text>
    <v-divider class="mx-4"></v-divider>
  </v-card>
</template>


<script>
export default {
    props: ['question']
}
</script>