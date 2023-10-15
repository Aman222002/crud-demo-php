import Vue from "vue";
import VueRouter from "vue-router";
import NavbarComponent from './components/NavbarComponent.vue';
import HomeComponent from './components/HomeComponent.vue';
import FooterComponent from './components/FooterComponent.vue';
import RegistrationComponent from './components/RegistrationComponent.vue';
import LoginComponent from './components/LoginComponent.vue';
import AboutComponent from './components/AboutComponent.vue';

Vue.use(VueRouter);

const routes = [
    {
        name: "home",
        path: '/',
        component: NavbarComponent
    },
    {
        name: "homecomponent",
        path: '/hey',
        component: HomeComponent
    },
    {
        name: "footer",
        path: '/footer',
        component: FooterComponent
    },
    {
        name: "register",
        path: '/register',
        component: RegistrationComponent
    },
    {
        name: "login",
        path: '/login',
        component: LoginComponent
    },
    {
        name: "about",
        path: '/about',
        component: AboutComponent
    },
];

const router = new VueRouter({
    routes
});

export default router;
