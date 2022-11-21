import { createRouter , createWebHistory } from "vue-router";

import CourcesIndex from "../components/cources/index.vue";
import CoursesNew from "../components/cources/New.vue";
import editcourse from "../components/cources/Edit.vue";
import notFound from "../components/404.vue";
const routes=[
    {
        path: '/',
        component:CourcesIndex
    },
    {
        path: '/course/new',
        name: 'addNew',
        component:CoursesNew
    },
    {
        path: '/course/:id/edit',
        component:editcourse,
        props: true
    },
    {
        path: '/:any(.*)',
        component:notFound
    },
]
const router = createRouter({
        history: createWebHistory(),
        routes: routes
    })
export default router;
