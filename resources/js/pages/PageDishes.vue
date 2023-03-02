<template>
    <div class="container">
        <!-- COPERTINA -->
        <div class="">
        </div>
        <!-- LOGO -->
        <div>
            <img :src="'storage/' + user.logo_image" alt="logo" onerror="this.src='storage/placeholder.jpeg';">
        </div>
        <div class="cards d-flex flex-wrap">
            <div class="rounded-4 mb-4 me-4 mycard" style="width: 15rem; height: 22rem;"
            v-for="dish in arrDishes.dishes" :key="dish.id">
                <img :src="'storage/' + dish.image" alt="image" onerror="this.src='storage/placeholder.jpeg';"
                class="rounded-4" style="width: 102%; height: 50%; position: relative; left: -2px; top: -2px;">
                <h4 class="tetx-center mt-2">{{ dish.name }}</h4>
                <h5>&euro; {{ dish.price }}</h5>
                <button class="m-3 rounded-5 text-white px-4 mycard-button" @click="$emit('addCart', dish)"> Aggiungi al carrello</button>
            </div>
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
