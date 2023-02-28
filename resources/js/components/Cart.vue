<template>
    <div>
        <div v-for="(objCart, index) in arrCart" :key="index">
            <div class="d-inline-block btn btn-danger" @click="deleteObj(index)">X</div>
            {{ objCart.name }} - {{ objCart.price }}&euro;
        </div>
        <div v-show="total">Totale: {{ total.toFixed(2) }}&euro;
        </div>
        <router-link :to="{name:'order'}"   v-show="total">Vai all'ordine</router-link>
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
        dishes_id: Number,
    },

    methods: {
        deleteObj(index){
            this.arrCart.splice(index, 1);
            this.dishes_id.splice(index, 1);
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

</style>
