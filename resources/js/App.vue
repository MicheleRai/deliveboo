<template>
    <div>
        <div class="d-flex justify-content-between">
            <navbar />
            <cart :arr-cart="arrCart" :dishes_id="dishes_id"/>
        </div>
        <main>
            <router-view @addCart="getCart" :arr-cart="arrCart" :dishes_id="dishes_id" @emptyCart="emptyCart"></router-view>
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
            user: null,
            dishes_id: [],
        }
    },

    methods: {
        getCart(dish){
            if(this.arrCart.length == 0){
                this.arrCart.push(dish);
                this.user = dish.user_id;
                this.dishes_id.push(dish.id);
            } else if (dish.user_id == this.user) {
                this.arrCart.push(dish);
                this.dishes_id.push(dish.id);
            } else {
                window.alert('Scegliere un piatto dello stesso ristorante')
            }

        },

        emptyCart(){
            this.arrCart = [];
        }
    },
}

</script>
<style lang="scss">
@import '~bootstrap/scss/bootstrap';

</style>
