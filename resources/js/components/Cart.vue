<template>
    <div class="carrello d-flex flex-column m-auto">
        <div class="ps-3 pb-2" v-if="arrCart.length == 0">
            <h4>Il tuo carrello è vuoto</h4>
        </div>
        <div class="carrello ps-3" v-for="(objCart, index) in arrCart" :key="index">
            <div class="d-inline-block btn btn-danger" @click="deleteObj(index)">X</div>
            {{ objCart.name }} - {{ objCart.price }}&euro;
        </div>
        <div class="ps-3" v-show="tot_price">Totale: {{ tot_price }}&euro;
        </div>
        <router-link class="ps-3" :to="{name:'order'}" v-show="tot_price">Vai all'ordine</router-link>
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
        dishes_id: Array,
        tot_price: String,
    },

    methods: {
        deleteObj(index){
            this.arrCart.splice(index, 1);
            this.dishes_id.splice(index, 1);
            this.$emit('removePrice');
        },
    },
}
</script>

<style lang="scss">
.carrello{
    background-color: rgb(255, 255, 255);
    border-radius:0 0 25px 25px ;
}
</style>
