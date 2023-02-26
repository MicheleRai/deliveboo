<template>
  <div>
    <div v-for="objCart in arrCart" :key="objCart">
        {{ objCart.name }} - {{ objCart.price }}&euro;
    </div>
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
    }
}
</script>

<style>

</style>
