import { createRouter, createWebHistory } from "vue-router";

import MainIndex from "../components/Main/Index.vue";
import NotFound from "../components/404.vue";
import ProductIndex from "../components/Products/Index.vue";

const routes = [
    {
        path: "/",
        component: MainIndex,
        name: MainIndex
    },
    {
        path: "/products",
        component: ProductIndex,
        name: ProductIndex
    },
    {
        path: "/:pathMatch(.*)*",
        component: NotFound,
        name: NotFound
    }
];

const router = createRouter({
    history: createWebHistory('/'),
    routes
});

export default router
