<template>
    <h2>Animal list</h2>
    <Table :rows="animals" :config="config">
        <template #main_picture_animal="{ main_picture_animal }">
            <img :src="'/build/images/animal/' + main_picture_animal" :alt="main_picture_animal">
        </template>
    </Table>
</template>

<script>
    import Table from '../Components/Table'
    export default {
        name: "animal",
        components: {
            Table
        },
        data() {
            return {
                animals: [],
                config: {
                    columns: {
                        "name" : {"data": "name_animal"},
                        "description" : {"data": "description_animal"},
                        "social" : {"data": "social_animal"},
                        "status" : {"data": "status_animal"},
                        "population" : {"data": "population_animal"},
                        "legs" : {"data": "legs_animal"},
                        "family" : {"data": "family_animal"},
                        "diet" : {"data": "diet_animal"},
                        "appearance" : {"data": "appearance_animal"},
                        "main picture" : {"data": "main_picture_animal"},
                    },
                    actions: true,
                }
            }
        },
        methods: {
            getImg(img) {
                return '/build/images/animal/' + img
            }
        },
        created() {
            fetch('/get/animals', {method: 'GET'})
                .then(response => response.json())
                .then(response => this.animals = response)
        }
    }
</script>

<style scoped>
    img {
        width: 100px;
    }
</style>