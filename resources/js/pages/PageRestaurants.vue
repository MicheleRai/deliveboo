<template>
    <div class="grid">
        <h1>Ristoranti in vue</h1>
        <div class="row text-center m-auto col-10">
        <router-link v-for="categories in arrCategories" :key="categories.id" class="btn btn-success col-1" :to="{name: 'categories', params: {slug: categories.slug}}">{{ categories.name }}</router-link>
       </div>
       <div class="row row-cols-3 col-10 m-auto">
           <div v-for="user in arrUsers" :key="user.id" class="card">
                <img :src="'storage/' + user.logo_image" alt="logo" onerror="this.src='storage/placeholder.jpeg';">
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
                arrCategories:[],
            }
        },
        created(){
            axios.get('/api/dishes')
                .then(response => {
                    this.arrUsers = response.data.results;
                    this.arrCategories = response.data.categories;
                });
                console.log(this.arrUsers);
        },
    }
</script>
<style lang="scss">

</style>
