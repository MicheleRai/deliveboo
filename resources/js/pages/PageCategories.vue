<template>
    <div>
        <h1>Risultati per: {{ arrCategories.name }} </h1>
        <div class="row row-cols-3 col-10 m-auto">
           <div v-for="restaurant in arrRestaurants" :key="restaurant.id" class="card">
                   <img :src="'storage/' + restaurant.logo_image" alt="logo">
                   <h3>{{ restaurant.name }}</h3>
                   <p>{{ restaurant.address }}</p>
                   <router-link :to="{name: 'dishes-user', params: {slug: restaurant.slug}}" class="btn btn-primary">Scopri di più</router-link>
           </div>
       </div>
    </div>
</template>

<script>
export default {
    name: 'PageCategories',
    props: [
        'slug',
    ],

    data(){
            return {
                arrCategories: [],
                arrRestaurants: [],
            }
    },

    created(){
        axios.get('/api/categories/' + this.slug)
            .then(response => {
                this.arrCategories = response.data.results;
                this.arrRestaurants = response.data.restaurants;
            });
    },
}
</script>

<style lang="scss">

</style>
