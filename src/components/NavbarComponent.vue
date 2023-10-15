<template>
    <v-card
    class="pa-3"
    color="indigo darken-2"
    >
      <v-navigation-drawer
      class="deep-black accent-2"
        v-model="drawer"
        :mini-variant.sync="mini"
        permanent
      >
        <v-list-item class="px-2">
  
          <v-btn
            icon
            @click.stop="mini = !mini"
          >
            <v-icon>mdi-chevron-left</v-icon>
          </v-btn>
        </v-list-item>
  
        <v-divider></v-divider>
  
        <v-list dense>
          <v-list-item
            v-for="item in items"
            :key="item.title"
            link
          >
            <v-list-item-icon>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-icon>
  
            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
           
          </v-list-item>
        </v-list>
      </v-navigation-drawer>
      
    </v-card>
  </template>
  <script>
  export default {
    data () {
      return {
        drawer: true,
        items: [
          { title: 'Home', icon: 'mdi-home-city' },
          { title: 'Registration', icon: 'mdi-account' },
          { title: 'Login', icon: 'mdi-account-group-outline' },
          { title:'About',icon:'mdi-logout'},
        ],
        mini: true,
      }
    },
  }
</script>