<template>
    <div class="grid">
       <h1>Sono la home in vue</h1>
       <div v-for="dish in arrDishes" :key="dish.id">
            <h3>{{ dish.name }}</h3>
       </div>
    </div>
</template>
<script>
    export default {
        name: 'PageHome',
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
