<template>
    <div>
        <div class="d-flex justify-content-between mt-5">
            <navbar />
            <cart :arr-cart="arrCart" :dishes_id="dishes_id" :tot_price="tot_price"/>
        </div>
        <main>
            <router-view @addCart="getCart" :arr-cart="arrCart" :dishes_id="dishes_id" @emptyCart="emptyCart" :tot_price="tot_price"></router-view>
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
            tot_price: null,
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

    computed: {
        total() {
            return this.tot_price = this.arrCart.reduce((acc, item) => acc + parseFloat(item.price), 0).toFixed(2);
        }
    }
}

</script>
<style lang="scss">
@import '~bootstrap/scss/bootstrap';
@import '../sass/app.scss';

</style>
