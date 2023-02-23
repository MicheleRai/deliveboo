<template>
    <div class="grid">
      <h1>Sono la pagina dei piatti specifici in vue</h1>
        <div v-for="dish in arrDishes" :key="dish.user_id">
           <img :src="dish.image" alt="logo">
           <h3>{{ dish.name }}</h3>
           <p>{{ dish.price }}</p>
        </div>
   </div>
</template>
<script>
    export default {
        name: 'PageDishes',
        data(){
            return {
                arrDishes:[],
            }
        },
        created(){
            axios.get('/api/dishes')
                .then(response => this.arrDishes = response.data.results)
        },
    }
</script>
<style lang="scss">
@import '~bootstrap/scss/bootstrap';

</style>
