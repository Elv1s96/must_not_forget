<template>
<div>
    <b-button @click="getTelegramData">Get</b-button>
    <b-button @click="telegramSendFile">sendFile</b-button>
    <b-button @click="telegramTestEvent">testEvent</b-button>
</div>
</template>

<script>
export default {
    name: "TelegramComponent",
    methods: {
        getTelegramData() {
            axios.get('/api/telegram').then(result => {
                console.log(result.data)
            })
        }        ,
        telegramSendFile() {
            axios.get('/api/telegram/sendFile').then(result => {
                console.log(result.data)
            })
        },
        telegramTestEvent() {
            axios.get('/api/telegram/testEvent').then(result => {
                console.log(result.data)
            })
        }
    }
}
</script>

<style scoped>

</style>
