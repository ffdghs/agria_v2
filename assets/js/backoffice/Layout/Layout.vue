<template>
    <div class="d-flex">
        <Sidebar></Sidebar>
        <div class="w-100">
            <header class="pt-1">
                <div class="d-flex">
                    <div class="align-self-baseline">
                        <a @click="toggleSidebar" class="btn btn-dark">Menu</a>
                    </div>
                    <h1 class="text-center fs-1 fw-bold flex-grow-1">Agria</h1>
                </div>
            </header>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Sidebar from './Sidebar'
    export default {
        name: "layout",
        components: {
            Sidebar
        },
        methods: {
            toggleSidebar() {
                document.querySelector('.sidebar').classList.toggle('d-none')
            }
        }
    }
</script>