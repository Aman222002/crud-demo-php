<template>
  <v-app>
    <v-main>
      <router-link to="/">Navbar</router-link><br><br>
      <router-link to="/hey">Home</router-link><br><br>
      <router-link to="/footer">Footer</router-link><br><br>
      <router-link to="/register">Registration</router-link><br><br>
      <router-link to="/login">Login</router-link><br><br>
      <router-link to="/about">About</router-link><br><br>
      <router-view></router-view>

      <!-- <HelloWorld/> -->
      <NavbarComponent/> 
      <br>
      <HomeComponent/>
      <br>
      <br>
      <br>
      <FooterComponent></FooterComponent>
      <RegistrationComponent></RegistrationComponent>
      <LoginComponent/>
     
     <AboutComponent/>
    </v-main>
  </v-app>
</template>

<script>
//import HelloWorld from './components/HelloWorld';
// import HomeComponent from './components/HomeComponent.vue';
// import NavbarComponent from './components/NavbarComponent.vue';
// import FooterComponent from './components/FooterComponent.vue';
//import RegistrationComponent from './components/RegistrationComponent.vue'
//import LoginComponent from './components/LoginComponent.vue';
//import AboutComponent from './components/AboutComponent.vue';

export default {
  name: 'App',

  components: {
   // HelloWorld,
  //   HomeComponent,
  //  NavbarComponent,
  //  FooterComponent,
  //RegistrationComponent,
  //LoginComponent,
  //AboutComponent,
  },

  data: () => ({
    //
  }),
};
</script>
