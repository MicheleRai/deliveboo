<template>
     <div class="grid">
       <h1>Sono la pagina del piatto singolo</h1>
            <img :src="dish.image" alt="logo">
            <h3>{{ dish.name }}</h3>
            <p>{{ dish.price }}</p>
            <p>{{ dish.description }}</p>
        </div>
    </div>
</template>

<style lang="scss">
@import '~bootstrap/scss/bootstrap';

</style>
