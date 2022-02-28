<template>
    <div class="sidebar p-5 ps-2 nav d-flex flex-column">
        <template v-for="route in routes">
            <router-link :to="route.path" class="text-decoration-none">{{route.name}}</router-link>
        </template>
    </div>
</template>

<script>
    import {routes} from '../Resources/routes'

    export default {
        name: "sidebar",
        data() {
            return {
                routes
            }
        },
    }
</script>

<style scoped>
    .nav a {
        font-size: 20px;
    }

</style>