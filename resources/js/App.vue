<template>
    <div>
        <navbar @aperturaCarrello="aperturaCarrello" class="nav" />
        <cart v-if="cazzo==true" class="cart fixed-top" :arr-cart="arrCart" :dishes_id="dishes_id" :tot_price="tot_price" @removePrice="removePrice"/>
        <main>
            <router-view @addCart="getCart" :arr-cart="arrCart" :dishes_id="dishes_id" @emptyCart="emptyCart" :tot_price="tot_price" @removePrice="removePrice"></router-view>
        </main>
        <footer-component/>
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue';
import Cart from './components/Cart.vue';
import FooterComponent from './components/FooterComponent.vue';

export default {
    name: 'App',
    components: {
        Navbar,
        Cart,
        FooterComponent,
    },

    data() {
      return {
            arrCart: [],
            user: null,
            dishes_id: [],
            tot_price: null,
            cazzo:false,
        }
    },

    methods: {
        getCart(dish){
            if(this.arrCart.length == 0){
                this.arrCart.push(dish);
                this.user = dish.user_id;
                this.dishes_id.push(dish.id);
                this.tot_price = this.arrCart.reduce((acc, item) => acc + parseFloat(item.price), 0).toFixed(2);
            } else if (dish.user_id == this.user) {
                this.arrCart.push(dish);
                this.dishes_id.push(dish.id);
                this.tot_price = this.arrCart.reduce((acc, item) => acc + parseFloat(item.price), 0).toFixed(2);
            } else {
                window.alert('Scegliere un piatto dello stesso ristorante')
            }

        },

        emptyCart(){
            this.arrCart = [];
        },

        removePrice(){
            this.tot_price = this.arrCart.reduce((acc, item) => acc + parseFloat(item.price), 0).toFixed(2);
        },
        aperturaCarrello(){
            this.cazzo = !this.cazzo
            console.log(this.cazzo)
        }
    },

    // computed: {
    //     total() {
    //         return this.tot_price = this.arrCart.reduce((acc, item) => acc + parseFloat(item.price), 0).toFixed(2);
    //     }
    // }
}

</script>
<style lang="scss">
@import '~bootstrap/scss/bootstrap';
@import '../sass/app.scss';

.nav{
    z-index: 1031;
}
.carrello{
    z-index: 2040;
}

</style>
