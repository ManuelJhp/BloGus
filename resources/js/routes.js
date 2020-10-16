import Vue from 'vue';
import VueRouter from 'vue-router'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: require('./views/Home').default
        },
        {
            path: '/nosotros',
            name: 'about',
            component: require('./views/About').default
        },
        {
            path: '/archivo',
            name: 'archive',
            component: require('./views/Archive').default
        },
        {
            path: '/contacto',
            name: 'contact',
            component: require('./views/Contact').default
        },
        {
            path: '/blog/:url',
            name: 'posts_show',
            component: require('./views/PostsShow').default,
            props: true
        },
        {
            path: '/categorias/:category',
            name: 'category_posts',
            component: require('./views/CategoryPosts').default,
            props: true
        },
        {
            path: '/etiquetas/:tag',
            name: 'tags_posts',
            component: require('./views/TagsPosts').default,
            props: true
        },
        {
            path: '*',
            component: require('./views/404').default
        }
    ],
    linkExactActiveClass: 'active',
    //mode: 'history',
    scrollBehavior(){
        return {x:0, y:0}
    }
});


