<template>
    <div class="container">
      <h1>Sono la pagina dei piatti specifici in vue</h1>
        <div v-for="dish in arrDishes.dishes" :key="dish.id">
            <img :src="'storage/' + dish.image" alt="image" onerror="this.src='storage/placeholder.jpeg';">
           <h3>{{ dish.name }}</h3>
           <p>&euro; {{ dish.price }}</p>
           <button class="btn btn-success" @click="$emit('addCart', dish)"> Aggiungi al carrello</button>
        </div>
   </div>
</template>
<script>
    export default {
        name: 'PageDishes',
        props: [
        'slug',
        ],

        data(){
            return {
                arrDishes:[],
            }
        },

        created(){
            axios.get('/api/dishes/' + this.slug)
                .then(response => this.arrDishes = response.data.results);
                console.log(this.arrDishes);
        },


    }
</script>
<style lang="scss">

</style>
