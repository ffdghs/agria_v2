<template>
    <h2>Avatar list</h2>
    <Table :rows="avatars" :config="config">
        <template #url_avatar="{ url_avatar }">
            <img :src="'/build/images/avatar/' + url_avatar" :alt="url_avatar">
        </template>
    </Table>
</template>

<script>
import Table from '../Components/Table'
export default {
    name: "avatar",
    components: {
        Table
    },
    data() {
        return {
            avatars: [],
            config: {
                columns: {
                    "name" : {"data": "name_avatar"},
                    "description" : {"data": "description_avatar"},
                    "picture" : {"data": "url_avatar"},
                },
                actions: true,
            }
        }
    },
    methods: {
    },
    created() {
        fetch('/get/avatars', {method: 'GET'})
            .then(response => response.json())
            .then(response => this.avatars = response)
    }
}
</script>

<style scoped>
img {
    width: 100px;
}
</style>