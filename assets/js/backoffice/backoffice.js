import { createApp } from 'vue'
import { createRouter, createWebHashHistory } from 'vue-router'

import Layout from './Layout/Layout';
import {routes} from './Resources/routes.js'


const router = createRouter({
    history: createWebHashHistory(),
    routes
})

createApp(Layout).use(router).mount('#backoffice')

