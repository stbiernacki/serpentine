import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

/* Layout */


let routes = [
    {
        path: '/dashboard',
        name: 'Welcome',
        component: () => import('@/views/welcome/')
    },
    {
        path: '/dashboard/example',
        name: 'Example',
        component: () => import('@/views/example/')
    }
];


// import routs from domain
let domainRouter = [
];

domainRouter.forEach(module => {
    module.forEach(route => {
        routes.push(route);
    });
});

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
