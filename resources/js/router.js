import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter)

const route = new VueRouter({
    mode: 'history',
    routes: [
        // {
        //     path: '/',
        //     component: IndexComponent
        // },
        {
            path: '/home',
            name: 'home',
            component: () => import('./components/HomeComponent')
        },
        {
            path: '/list',
            name: 'list',
            component: () => import('./components/ListComponent')
        },
        {
            path: '/telegram',
            name: 'telegram',
            component: () => import('./components/TelegramComponent')
        },
        {
            path: '/users/login',
            name: 'user.login',
            component: () => import('./components/User/Login')
        },
        {
            path: '/users/registration',
            name: 'user.registration',
            component: () => import('./components/User/Registration')
        },
    ]
})

route.beforeEach((to,from,next) => {
    const token = localStorage.getItem('x_xsrf_token')
    if(!token) {
        if(to.name === 'user.login' || to.name === 'user.registration') {
            return next()
        } else {
            return next({
                name: 'user.login'
            })
        }
    }

    if(to.name === 'user.login' || to.name === 'user.registration' && token) {
        return next({
            name: 'home'
        })
    }
    next()
})

export default route

