<template>
    <h2>Picture list</h2>
    <Table :rows="pictures" :config="config">
        <template #url_picture="{ url_picture }">
            <img :src="'/build/images/picture/' + url_picture" :alt="url_picture">
        </template>
        <template #animal="{ url_picture }">
            <img :src="'/build/images/picture/' + url_picture" :alt="url_picture">
        </template>
    </Table>
</template>

<script>
import Table from '../Components/Table'
export default {
    name: "picture",
    components: {
        Table
    },
    data() {
        return {
            pictures: [],
            config: {
                columns: {
                    "picture" : {"data": "url_picture"},
                    "name" : {"data": "name_animal"},
                },
                actions: true,
            }
        }
    },
    methods: {
    },
    created() {
        fetch('/get/pictures', {method: 'GET'})
            .then(response => response.json())
            .then(response => this.pictures = response)
    }
}
</script>

<style scoped>
img {
    width: 100px;
}
</style>