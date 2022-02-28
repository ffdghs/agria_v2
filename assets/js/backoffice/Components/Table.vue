<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th v-for="(content, columnName) in config.columns">
                    {{columnName}}
                </th>
                <th v-if="config.actions">actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(row, index) in rows">
                <td v-for="(content, columnName) in config.columns">
                    <slot :name="content.data" v-bind="row">
                        {{row[content.data]}}
                    </slot>
                </td>
                <td v-if="config.actions">
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Remove</button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "Table",
    props: {
        config: {
            default() {
                return {}
            }
        },
        rows: {
            Array,
            default() {
                return []
            }
        }
    }
}
</script>

<style scoped>

</style>