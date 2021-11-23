import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

import Posts from './pages/Posts';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'posts',
            component: Posts
        }
    ],
});

export default router;