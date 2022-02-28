export const routes = [
    {
        path: '/animal',
        name: 'animal',
        component: () => import('../Pages/Animal')
    },
    {
        path: '/avatar',
        name: 'avatar',
        component: () => import('../Pages/Avatar')
    },
    {
        path: '/badge',
        name: 'badge',
        component: () => import('../Pages/Badge')
    },
    {
        path: '/habitat',
        name: 'habitat',
        component: () => import('../Pages/Habitat')
    },
    {
        path: '/picture',
        name: 'picture',
        component: () => import('../Pages/Picture')
    },
    {
        path: '/pin',
        name: 'pin',
        component: () => import('../Pages/Pin')
    },
    {
        path: '/question',
        name: 'question',
        component: () => import('../Pages/Question')
    },
    {
        path: '/trophy',
        name: 'trophy',
        component: () => import('../Pages/Trophy')
    },
    {
        path: '/user',
        name: 'user',
        component: () => import('../Pages/User')
    }
]