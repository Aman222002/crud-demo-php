<template>
  <v-container>
    <v-row align="center" justify="center">
      <v-col cols="12" md="8">
        <v-img src="@/assets/download.jpeg"></v-img>
        <v-form ref="form">
          <v-text-field v-model="formValues.firstname" :rules="nameRules" label="Name" required></v-text-field>

          <v-text-field v-model="formValues.email" :rules="emailRules" label="E-mail" required></v-text-field>

          <v-text-field v-model="formValues.password" :rules="passwordRules" label="Password" type="password"
            required></v-text-field>

          <v-text-field v-model="formValues.confirmpassword" :rules="confirmPasswordRules" label="Confirm Password"
            type="password" required></v-text-field>

          <v-btn @click="submitForm" primary>Submit</v-btn>
        </v-form>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    formValues: {
      firstname: '',
      email: '',
      password: '',
      confirmpassword: '',
    },
  }),
  computed: {
    nameRules() {
      return [
        () => !!this.formValues.firstname || 'Name is required',
        () => this.formValues.firstname.length <= 10 || 'Name must be less than 10 characters',
      ];
    },
    emailRules() {
      return [
        () => !!this.formValues.email || 'E-mail is required',
        () => /.+@.+/.test(this.formValues.email) || 'E-mail must be valid',
      ];
    },
    passwordRules() {
      return [
        () => !!this.formValues.password || 'Password is required',
        () => /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/.test(this.formValues.password) || 'Minimum 6 characters, One capital letter, Special character, Number',
      ];
    },
    confirmPasswordRules() {
      return [
        () => !!this.formValues.confirmpassword || 'Confirm password is required',
        () => this.formValues.confirmpassword === this.formValues.password || 'The password confirmation does not match',
      ];
    },
  },
  methods: {
    submitForm() {
      if (this.$refs.form.validate()) {
        
        console.log('Form values:', this.formValues);

        
      }
    },
  },
};
</script>
