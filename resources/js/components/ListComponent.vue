<template>
<div>
    <h1>List</h1>
    <b-button @click.prevent="getData">GET</b-button>
</div>
</template>

<script>
export default {
    name: "ListComponent",
    data() {
        return {

        }
    },
    methods: {
        getData() {
            axios.get('/api/get').then(result => {
                console.log(result)
            }).catch(error => {
                console.log('ERROR',error)
            })
        }
    }
}
</script>

<style scoped>

</style>
