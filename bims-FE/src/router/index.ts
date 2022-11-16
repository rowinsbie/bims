import { createRouter, createWebHistory, type RouteLocationNormalized } from "vue-router";
import LoginView from "../views/LoginView.vue";
import DashboardView from "../views/auth/DashboardView.vue";
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "login",
            component: LoginView,
        },
        {
            path:"/dashboard",
            name:"dashboard",
            component:DashboardView,
            meta:{
                requiresAuth:true
            }
        },
        {
            path: "/about",
            name: "about",
            // route level code-splitting
            // this generates a separate chunk (About.[hash].js) for this route
            // which is lazy-loaded when the route is visited.
            component: () => import("../views/AboutView.vue"),
        },
    ],
});

router.beforeEach((to:RouteLocationNormalized,from:RouteLocationNormalized,next:Function) => {
    const isAuthenticated = localStorage.getItem('token');
    if((to.name !== 'login' && to.meta.requiresAuth) && !isAuthenticated) next({name:'login'}) // check if authenticated
    else if(isAuthenticated && to.name == 'login') next({name:'dashboard'})  // redirect to dashboard if authenticated and going on route login
    else next();
});

export default router;
