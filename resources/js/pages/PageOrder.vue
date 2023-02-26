<template>
    <div>
        <cart :arr-cart="arrCart"/>
    </div>
</template>

<script>
import Cart from '../components/Cart.vue';

export default {
    components: {
        Cart,
    },

    props: {
        arrCart: Array,
    },
}
</script>

<style>

</style>
