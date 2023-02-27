<template>
    <div class="">
        <div v-for="(objCart, index) in arrCart" :key="index" class="card col-5 m-auto">
            <div class="d-inline-block btn btn-danger" @click="deleteObj(index)">X</div>
            {{ objCart.name }} - {{ objCart.price }}&euro;
        </div>
        <div v-show="total">Tot: {{ total.toFixed(2) }}&euro;</div>
        <form id="app" action="" method="post" class="card col-5 m-auto">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">

            <label for="name">Nome e Cognome</label>
            <input type="text" name="name" id="name">

            <label for="address">Indirizzo</label>
            <input type="text" name="address" id="address">

            <label for="note">Note</label>
            <textarea name="note" id="note"></textarea>

            <label for="price">Totale in &euro;</label>
            <input type="number" name="price" id="price" :placeholder="total.toFixed(2)" disabled>
            <input type="submit" value="submit">
        </form>
    </div>
</template>

<script>


export default {
    data(){
       return {

    }
    },
    props: {
        arrCart: Array,
    },
    methods: {
        deleteObj(index){
            this.arrCart.splice(index, 1);
        },
    },

    computed: {
        total() {
            return this.arrCart.reduce((acc, item) => acc + parseFloat(item.price), 0);
        }
    }
}
</script>

<style lang="scss">
@import '~bootstrap/scss/bootstrap';

</style>
