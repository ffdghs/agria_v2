<template>
    <h2>Habitat list</h2>
    <Table :rows="habitats" :config="config"></Table>
</template>

<script>
import Table from '../Components/Table'
export default {
    name: "habitat",
    components: {
        Table
    },
    data() {
        return {
            habitats: [],
            config: {
                columns: {
                    "name" : {"data": "name_habitat"},
                },
                actions: true,
            }
        }
    },
    methods: {
    },
    created() {
        fetch('/get/habitats', {method: 'GET'})
            .then(response => response.json())
            .then(response => this.habitats = response)
    }
}
</script>

<style scoped>
img {
    width: 100px;
}
</style>