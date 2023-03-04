<template>
    <div>
        <navbar @aperturaCarrello="aperturaCarrello" :counter-cart="counterCart" class="nav" />
        <div class="cart-container fixed-top m-auto">
            <!--tentativo di creare un carrello vuoto
                <div v-if="btnCarrello==false" class="carrello-vuoto cart me-0">
                </div>
            -->
            <cart v-if="btnCarrello==true" class="cart me-0" :arr-cart="arrCart" :dishes_id="dishes_id" :tot_price="tot_price" @removePrice="removePrice"/>
        </div>
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
            btnCarrello:false,
            counterCart: 0,
        }
    },

    methods: {
        getCart(dish){
            if(this.arrCart.length == 0){
                this.arrCart.push(dish);
                this.user = dish.user_id;
                this.dishes_id.push(dish.id);
                this.tot_price = this.arrCart.reduce((acc, item) => acc + parseFloat(item.price), 0).toFixed(2);
                this.counterCart++;
            } else if (dish.user_id == this.user) {
                this.arrCart.push(dish);
                this.dishes_id.push(dish.id);
                this.tot_price = this.arrCart.reduce((acc, item) => acc + parseFloat(item.price), 0).toFixed(2);
                this.counterCart++;
            } else {
                window.alert('Scegliere un piatto dello stesso ristorante')
            }

        },

        emptyCart(){
            this.arrCart = [];
            this.counterCart = 0;
            this.tot_price = null;
        },

        removePrice(){
            this.tot_price = this.arrCart.reduce((acc, item) => acc + parseFloat(item.price), 0).toFixed(2);
            this.counterCart--;
        },
        aperturaCarrello(){
            this.btnCarrello = !this.btnCarrello
            console.log(this.btnCarrello)
        }
    },
}

</script>
<style lang="scss">
@import '~bootstrap/scss/bootstrap';
@import '../sass/app.scss';

.nav{
    z-index: 1031;
}
.cart{
    padding-top: 65px;
    max-width: 300px;
}
.cart-container{
    max-width: 1120px;

}


</style>
