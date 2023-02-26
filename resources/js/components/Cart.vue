<template>
    <div>
        <div v-for="(objCart, index) in arrCart" :key="index">
            {{ objCart.name }} - {{ objCart.price }}&euro;
        </div>
        <div>Tot: {{ total.toFixed(2) }}&euro;</div>
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

    computed: {
        total() {
            return this.arrCart.reduce((acc, item) => acc + parseFloat(item.price), 0);
        }
  }
}
</script>

<style>

</style>
