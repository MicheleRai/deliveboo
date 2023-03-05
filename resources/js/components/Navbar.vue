<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" :class="{ 'onScroll': !view.topOfPage }">
        <div class="container-fluid nav-content">
            <div class="d-flex justify-content-between col-12">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <router-link class="me-1" :to="{ name: 'home' }"><img class="nav-img" src="../../../storage/app/public/uploads/logo-deliveboo.png" alt="Deliverboo"></router-link>
                        <router-link class="me-1 restaurant-link" :to="{ name: 'restaurants' }">Ristoranti</router-link>

                        <a href="/login" class="restaurant-link">Accedi</a>
                    </div>
                </div>
                <router-link :to="{ name: 'order' }" class="order-link">Il tuo ordine</router-link>
                <button @click="$emit('aperturaCarrello')" class="order-link-due">
                    <img class="img-carrello" src="../../../storage/app/public/shopping-cart.png" alt="">
                    <div class="contatore position-absolute rounded-circle"> {{ this.counterCart }}</div>
                </button>

            </div>
        </div>
    </nav>
</template>

  <script>

  export default {

      data () {
      return {
        view: {
          topOfPage: true
        }
      }
    },

    props: {
        counterCart: Number,
    },

    beforeMount() {
      window.addEventListener('scroll', this.handleScroll)
    },
    methods: {
      handleScroll(){
        if(window.pageYOffset>0){
          if(this.view.topOfPage) this.view.topOfPage = false
        } else {
          if(!this.view.topOfPage) this.view.topOfPage = true
        }
      }
    },
  }


  </script>

  <style>
  nav{
      transition: all 0.5s ease-in-out;
  }
  .navbar-button{
    background-color: #ffffff6d;
  }
  .nav-content{
    max-width: 1100px;
  }
  .onScroll {
    background-color: #ffffff;
    box-shadow: 10px 10px 5px 12px (black 0.175);
    color: white;
  }
  .nav-img{
    height: 35px;
  }
  .img-carrello{
    height: 35px;
  }
  .contatore{
    top: 25px;
    right: 3px;
    background-color: rgb(8, 207, 8);
    padding:0 5px;
    font-size: small;
  }

  .restaurant-link{
    padding: .5em 1em;
    background-color: #3fa9f5;
    color: black;
    text-decoration: none;
    border-radius: 10px;
    margin: 0 1em;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .restaurant-link:hover{
    background-color: #00ccbb;
    color: black;
  }
  .order-link{
    padding: .5em;
    background-color: rgb(255, 200, 0);
    color: black;
    text-decoration: none;
    border-radius: 10px;
    margin-top: 0;
    margin-bottom: 0;
    margin-right: 2rem;
    font-weight: bold;
    height: 55px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .order-link:hover{
    background-color: orange;
    color: black;
  }

  .order-link-due{
    position: relative;
    background-color: rgb(255, 200, 0);
    border-radius: 10px;
    padding: .5em 1em .5em .5em;
    border: none;
    height: 55px;

  }

  .order-link-due:hover{
    background-color: orange;
    color: black;
  }

  </style>
