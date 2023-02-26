<template>
    <div>
        <div class="d-flex justify-content-between">
            <navbar />
            <cart :arr-cart="arrCart"/>
        </div>
        <main>
            <router-view @addCart="getCart" :arr-cart="arrCart"></router-view>
        </main>
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue';
import Cart from './components/Cart.vue';

export default {
    name: 'App',
    components: {
        Navbar,
        Cart,
    },

    data() {
        return {
            arrCart: [],
        }
    },

    methods: {
        getCart(dish){
            this.arrCart.push(dish);
            console.log(this.arrCart);
        }
    },
}

</script>
<style lang="scss">
@import '~bootstrap/scss/bootstrap';

</style>
