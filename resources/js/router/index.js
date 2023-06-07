import { createRouter, createWebHistory } from "vue-router";

import Home from "../components/Home.vue";
import NotFound from "../components/404.vue";
import Page from "../components/Page.vue";

const routes = [
    {
        path: "/",
        component: Home,
        name: Home
    },
    {
        path: "/page",
        component: Page,
        name: Page
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
