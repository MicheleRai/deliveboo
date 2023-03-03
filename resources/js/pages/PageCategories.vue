<template>
    <div>
        <div class="cont">
            <img class="cover" src="../../../public/images/interni-ristorante.webp" alt="logo" onerror="this.src='storage/placeholder.jpeg';" style="width: 100vw; height: 60vh; object-fit: cover; object-position: center; opacity: 0.8">
            <div>
                <h1 class="m-4">Risultati per "{{ arrCategories.name }}"</h1>
                <div class="cards d-flex flex-wrap">
                    <div class="rounded-4 mb-4 me-4 mycard" style="width: 14rem; height: 24rem;"
                        v-for="restaurant in arrRestaurants" :key="restaurant.id"
                    >
                        <img :src="'storage/' + restaurant.logo_image" alt="logo" onerror="this.src='storage/placeholder.jpeg';"
                        class="rounded-4" style="width: 102%; height: 50%; position: relative; left: -2px; top: -2px;">
                        <div class="mx-4">
                            <h5 class="tetx-center">{{ restaurant.name }}</h5>
                            <div class="my-3">{{ restaurant.address }}</div>
                            <div class="my-3">080 219 7961</div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <router-link :to="{name: 'dishes-user', params: {slug: restaurant.slug}}" class="m-3 rounded-5 text-white px-4 mycard-button">Vedi Menu</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PageCategories',
    props: [
        'slug',
    ],

    data(){
            return {
                arrCategories: [],
                arrRestaurants: [],
            }
    },

    created(){
        axios.get('/api/categories/' + this.slug)
            .then(response => {
                this.arrCategories = response.data.results;
                this.arrRestaurants = response.data.restaurants;
            });
    },
}
</script>

<style lang="scss">

</style>
