<template>
    <v-app>
      <v-main>
        <v-container fluid>
          <v-row justify="center">
            <v-col cols="12" sm="6" md="4">
              <v-img src="@/assets/images.jpeg" max-height="150"></v-img>
              <v-form v-model="valid" ref="form">
                <v-text-field v-model="email" :rules="emailRules" label="E-mail" required></v-text-field>
                <v-text-field v-model="password" :rules="passwordRules" label="Password" type="password" required></v-text-field>
                <v-btn @click="submitForm" color="primary">Submit</v-btn>
              </v-form>
            </v-col>
          </v-row>
        </v-container>
      </v-main>
    </v-app>
  </template>
  
  <script>
  export default {
    data() {
      return {
        valid: false,
        email: '',
        password: '',
        emailRules: [
          v => !!v || 'E-mail is required',
          v => /.+@.+/.test(v) || 'E-mail must be valid',
        ],
        passwordRules: [v => !!v || 'Password is required'],
      };
    },
    methods: {
      submitForm() {
        if (this.$refs.form.validate()) {
          
          console.log('Form data:', { email: this.email, password: this.password });
        }
      },
    },
  };
  </script>
  