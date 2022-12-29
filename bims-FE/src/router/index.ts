import { createRouter, createWebHistory, type RouteLocationNormalized } from "vue-router";
import LoginView from "../views/LoginView.vue";
import DashboardView from "../views/auth/DashboardView.vue";
import AidView from '../views/auth/AidView.vue';
import ResidentsView from '../views/auth/ResidentsView.vue';
import CertificationView from '../views/auth/CertificationView.vue';
import IncidentsView from '../views/auth/IncidentsView.vue';
import LogsView from '../views/auth/LogsView.vue';
import AdminView from '../views/auth/AdminView.vue';
import NotFoundView from '../views/auth/NotFoundView.vue';

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
            path:"/aid",
            name:"aid",
            component:AidView,
            meta:{
                requiresAuth:true
            }
        },
        {
            path:"/residents-list",
            name:"residentsList",
            component:ResidentsView,
            meta:{
                requiresAuth:true
            }
        },
        {
            path:"/certification",
            name:"certification",
            component:CertificationView,
            meta:{
                requiresAuth:true
            }
        },
        {
            path:"/incidents",
            name:"incidents",
            component:IncidentsView,
            meta:{
                requiresAuth:true
            }
        },
        {
            path:"/logs",
            name:"logs",
            component:LogsView,
            meta:{
                requiresAuth:true
            }
        },
        {
            path:"/admin",
            name:"admin",
            component:AdminView,
            meta:{
                requiresAuth:true
            }
        },
        {
            path:'/:pathMatch(.*)',
            name:'NotFound',
            component:NotFoundView
        }
    ],
});

router.beforeEach((to:RouteLocationNormalized,from:RouteLocationNormalized,next:Function) => {
    const isAuthenticated = localStorage.getItem('token');
    if((to.name !== 'login' && to.meta.requiresAuth) && !isAuthenticated) next({name:'login'}) // check if authenticated
    else if(isAuthenticated && to.name == 'login') next({name:'dashboard'})  // redirect to dashboard if authenticated and going on route login
    else next();
});

export default router;
