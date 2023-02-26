<template>
  <div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Deliveboo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <router-link class="nav-link active" :to="{name: 'home' }">Home</router-link>
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

}
</script>

<style>

</style>
