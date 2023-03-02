<template>
    <div class="grid">
        <div class="copertina mb-5"></div>
        <h1 class="text-center mb-5">Scopri tutti i ristoranti </h1>
        <div class="row text-center m-auto justify-content-center mb-3">
        <router-link v-for="categories in arrCategories" :key="categories.id" class="btn btn-success col-1 mx-3 p-1" :to="{name: 'categories', params: {slug: categories.slug}}">{{ categories.name }}</router-link>
        </div>
        <div class="cards d-flex gap-3 flex-wrap m-auto justify-content-center">
            <div class="rounded-4 mxy-3 mycard justify-content-center" style="width: 15rem; height: 22rem;"
                v-for="user in arrUsers" :key="user.id">
                <!-- singola card -->
                <img :src="'storage/' + user.logo_image" alt="logo" onerror="this.src='storage/placeholder.jpeg';"
                    class="rounded-top" style="width: 102%; height: 50%; position: relative; left: -2px; top: -2px;">
                <div class="mx-4 text-center">
                    <h4>{{ user.name }}</h4>
                    <div class="my-3">{{ user.address }}</div>
                    <div class="my-3">080 219 7961</div>
                </div>
                <router-link :to="{ name: 'dishes-user', params: { slug: user.slug } }"
                    class="m-3 rounded-5 text-white px-4 mycard-button">Vedi Menu
                </router-link>
            </div>
            <div class="container-fluid d-flex align-items-center flex-column justify-content-center alligcontent-center py-5 jumbo">
                <h1 class="text center text-light">Vuoi entrare a far parte della nostra famiglia</h1>
                <button type="button" class="btn btn-light">Registrati</button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'PageHome',
        data(){
            return {
                arrUsers:[],
                arrCategories:[],
            }
        },
        created(){
            axios.get('/api/dishes')
                .then(response => {
                    this.arrUsers = response.data.results;
                    this.arrCategories = response.data.categories;
                });
                console.log(this.arrUsers);
        },
    }
</script>
<style lang="scss">
    .copertina{
        background-image: url(https://www.ucsf.edu/sites/default/files/styles/article_feature_banner__image/public/2019-09/vegetables-cooking-food-banner-size.jpg);
    }
    .jumbo{
        background-image: linear-gradient(#00ccbb, #00ccbb, white);
    }
</style>
