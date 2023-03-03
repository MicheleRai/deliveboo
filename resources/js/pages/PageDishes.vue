<template>
    <div class="big-box">
        <!-- COPERTINA -->
        <div class="cover-container">
            <img class="cover" :src="'storage/' + arrDishes.cover_image" alt="logo" onerror="this.src='storage/placeholder.jpeg';">
        </div>

        <!-- LOGO -->
        <div class="logo-box">
            <div class="logo-container">
                <img class="logo" :src="'storage/' + arrDishes.logo_image" alt="logo" onerror="this.src='storage/placeholder.jpeg';">
            </div>
        </div>

        <div class="cards-container">
            <div class="rounded-4 mycard" style="width: 15rem; height: 22rem;"
            v-for="dish in arrDishes.dishes" :key="dish.id">
                <img :src="'storage/' + dish.image" alt="image" onerror="this.src='storage/placeholder.jpeg';"
                class="rounded-4" style="width: 102%; height: 50%; position: relative; left: -2px; top: -2px;">
                <div class="dish-name">{{ dish.name }}</div>
                <div class="dish-price"><span style="color: #00ccbb ;">&euro;</span> {{ dish.price }}</div>
                <button class="dish-button" @click="$emit('addCart', dish)"> Aggiungi al carrello</button>
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

    .logo-box{
        width: 100%;
        display: flex;
        justify-content: center;
    }

   .logo-container{
    border-radius: 50%;
    width: 350px;
    height: 350px;
    background-size:cover;
    background-position:center center;
    background-repeat:no-repeat;
    border: solid #00ccbb 10px;
    margin: 3em;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background-color: white;
    position: absolute;
    margin: -200px;
   }

   .logo{
    width: 100%;
   }

   .cover-container{
    width: 100%;
    height: 500px;
    margin: 3em;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    overflow: hidden;
   }

   .cover{
    width: 100%;
   }

   .cards-container{
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    align-items: center;
    justify-content: center;
    position: relative;
    margin-top: 200px;
    margin-bottom: 50px;
   }

   .mycard{
    margin: 2rem;
    display: flex;
    flex-direction: column;
   }

   .dish-name{
    text-align: center;
    font-size: 2em;
    margin-top: .5em;
   }

   .dish-price{
    font-size: 2em;
    margin-top: .5em;
    margin-left: .5em;
   }
</style>
