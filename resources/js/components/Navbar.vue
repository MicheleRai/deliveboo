<template>
    <div>
      <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" :class="{ 'onScroll': !view.topOfPage}">
              <div class="container-fluid">
                  <a class="navbar-brand" href="#">Deliveboo</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav">
                      <router-link class="nav-link active" :to="{name: 'home' }">Home</router-link>
                      <router-link class="nav-link active" :to="{name: 'restaurants' }">Ristoranti</router-link>

                      <a href="/login" class="nav-link active btn btn-primary text-light">Sei un ristoratore? Clicca qui</a>
                  </div>
                  <router-link :to="{name: 'order'}" class="btn btn-warning">Ordini</router-link>
                  </div>
              </div>
          </nav>
    </div>
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
  .onScroll {
    background-color: rgb(0, 195, 255);
    box-shadow: 0 3px 10px (0, 0, 0, 0.15);
    color: white;
  }
  </style>
