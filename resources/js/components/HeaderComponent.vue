<template>
  <v-card
    color="grey lighten-4"
    text>
    <v-toolbar>
     
      <v-toolbar-title>Laravel Fourm Application</v-toolbar-title>
      <v-spacer></v-spacer>

      <div>
      
        <menubar-component></menubar-component>

      </div>

    </v-toolbar>
  </v-card>
</template>



<script>
import MenubarComponent from './MenubarComponent.vue';
export default {
    components: {
        MenubarComponent
    }
}
</script>