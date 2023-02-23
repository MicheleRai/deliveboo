<template>
    <div class="grid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Deliveboo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                    <a href="/login" class="nav-link active btn btn-primary text-light">Sei un ristoratore? Clicca qui</a>
                </div>
                </div>
            </div>
        </nav>
        <h1>Sono la home in vue</h1>
       <div class="row row-cols-3 col-10 m-auto">
           <div v-for="user in arrUsers" :key="user.id" class="card">
                   <img :src="user.logo_image" alt="logo">
                   <h3>{{ user.name }}</h3>
                   <p>{{ user.address }}</p>
                   <router-link :to="{name: 'dishes-user', params: {slug: user.slug}}" class="btn btn-primary">Scopri di più</router-link>
           </div>
       </div>
    </div>
</template>
<script>
    export default {
        name: 'PageHome',
        data(){
            return {
                arrUsers:[],
            }
        },
        created(){
            axios.get('/api/users')
                .then(response => this.arrUsers = response.data.results)
                console.log(this.arrUsers);
        },
    }
</script>
<style lang="scss">
@import '~bootstrap/scss/bootstrap';

</style>
