<template>
    <h2>Badge list</h2>
    <Table :rows="badges" :config="config">
        <template #url_badge="{ url_badge }">
            <img :src="'/build/images/badge/' + url_badge" :alt="url_badge">
        </template>
    </Table>
</template>

<script>
import Table from '../Components/Table'
export default {
    name: "badge",
    components: {
        Table
    },
    data() {
        return {
            badges: [],
            config: {
                columns: {
                    "name" : {"data": "name_badge"},
                    "description" : {"data": "description_badge"},
                    "picture" : {"data": "url_badge"},
                },
                actions: true,
            }
        }
    },
    methods: {
    },
    created() {
        fetch('/get/badges', {method: 'GET'})
            .then(response => response.json())
            .then(response => this.badges = response)
    }
}
</script>

<style scoped>
img {
    width: 100px;
}
</style>