<template>
    <div class="grid">
        <h1>Sono la home in vue</h1>
       <div class="row row-cols-3 col-10 m-auto">
           <div v-for="user in arrUsers" :key="user.id" class="card">
                   <img :src=" user.image == '' ? '../../../storage/app/public/placeholder.jpeg' : 'storage/' + user.logo_image" alt="logo">
                   <h3>{{ user.name }}</h3>
                   <p>{{ user.address }}</p>
                   <router-link :to="{name: 'dishes-user', params: {slug: user.slug}}" class="btn btn-primary">Scopri di più</router-link>
           </div>
       </div>
       <div class="row">
        <router-link v-for="categories in arrCategories" :key="categories.id" class="btn btn-success col-1" :to="{name: 'categories', params: {slug: categories.slug}}">{{ categories.name }}</router-link>
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
