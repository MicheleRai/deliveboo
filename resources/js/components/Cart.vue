<template>
  <div>
    <div v-for="objCart in arrCart" :key="objCart">
        {{ objCart }}
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
