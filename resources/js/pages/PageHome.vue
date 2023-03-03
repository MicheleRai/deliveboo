<template>
    <div class="grid">
        <div class="copertina mb-5"></div>
        <h1 class="text-center mb-5">Scopri tutti i ristoranti </h1>
        <div class="d-flex row text-center m-auto justify-content-center mb-3 flex-wrap gap-2">
        <router-link v-for="categories in arrCategories" :key="categories.id" class="btn btn-success col-2 mx-3 p-1" :to="{name: 'categories', params: {slug: categories.slug}}">{{ categories.name }}</router-link>
        </div>
        <div class="cards d-flex gap-3 flex-wrap m-auto justify-content-center">
                <div class="rounded-4 mb-4 me-4 mycard" style="width: 14rem; height: 24rem;" v-for="user in arrUsers" :key="user.id">
                    <img :src="'storage/' + user.logo_image" alt="logo" onerror="this.src='storage/placeholder.jpeg';"
                    class="rounded-4" style="width: 102%; height: 50%; position: relative; left: -2px; top: -2px;">
                    <div class="mx-4">
                        <h5 class="tetx-center">{{ user.name }}</h5>
                        <div class="my-3">{{ user.address }}</div>
                        <div class="my-3">080 219 7961</div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <router-link :to="{ name: 'dishes-user', params: { slug: user.slug } }"
                        class="m-3 rounded-5 text-white px-4 mycard-button">Vedi Menu</router-link>
                    </div>
                </div>
                <div class="container-fluid d-flex align-items-center flex-column justify-content-center alligcontent-center py-5 jumbo">
                    <img src="../../../storage/app/public/uploads/logo-deliveboo-white.png" alt="">
                    <h1 class="fs-1 fw-bolder text center text-light my-5">Vuoi entrare a far parte della nostra famiglia?</h1>
                    <button type="button" class="shadow btn btn-light rounded-pill px-5">Registrati</button>
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
    .rounded-pill{
        color: #03b8a9;
    }
</style>
