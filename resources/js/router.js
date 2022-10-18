import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
// Importo i vari componenti
import HomePage from './pages/HomePage.vue'
import AboutPage from './pages/AboutPage.vue'
import ContactPage from './pages/ContactPage.vue'
import BlogPage from './pages/BlogPage.vue'
import ShowPost from './pages/ShowPost.vue'
import NotFound from './pages/NotFound.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogPage
        },
        {
            path: '/about',
            name: 'about',
            component: AboutPage
        },
        {
            path: '/contact',
            name: 'contact',
            component: ContactPage
        },
        {
            path: '/blog/:slug',
            name: 'showpost',
            component: ShowPost
        },
        {
            path: '/*',
            name: 'notfound',
            component: NotFound
        },
    ]
});

export default router;