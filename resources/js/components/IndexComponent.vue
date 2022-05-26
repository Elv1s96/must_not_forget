<template>
<div>
    <router-link :to="{ name:'home'}">Home</router-link>
    <router-link v-if="token" :to="{ name:'list'}">List</router-link>
    <router-link v-if="!token" :to="{ name:'user.login'}">login</router-link>
    <router-link v-if="!token" :to="{ name:'user.registration'}">Registration</router-link>
    <a v-if="token" href="#" @click.prevent="logout">Logout</a>
    <router-view></router-view>
</div>
</template>

<script>
export default {
    name: "IndexComponent",
    data() {
        return {
            token: null
        }
    },
    methods: {
        logout() {
            axios.post('/logout').then(result => {
                localStorage.removeItem('x_xsrf_token')
                this.$router.push({name: 'user.login'})
            }).catch(error => {
                console.log('logout error', error)
            })
        },
        getToken() {
            this.token = localStorage.getItem('x_xsrf_token')
        },
    },
    mounted() {
        this.getToken()
    },
    updated() {
        this.getToken()
    }
}
</script>

<style scoped>

</style>
