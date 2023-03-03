<template>
    <div class="carrello d-flex align-items-end flex-column m-auto">
        <div class="carrello" v-for="(objCart, index) in arrCart" :key="index">
            <div class="d-inline-block btn btn-danger" @click="deleteObj(index)">X</div>
            {{ objCart.name }} - {{ objCart.price }}&euro;
        </div>
        <div v-show="tot_price">Totale: {{ tot_price }}&euro;
        </div>
        <router-link :to="{name:'order'}" v-show="tot_price">Vai all'ordine</router-link>
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
    background-color: rgb(157, 214, 214);
    border-radius:0 0 25px 25px ;
}
</style>
