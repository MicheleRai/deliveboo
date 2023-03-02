<template>
    <div>
        <!-- <div class="grid">
            <h1>Ristoranti in vue</h1>
           <div class="row row-cols-3 col-10 m-auto">
               <div v-for="user in arrUsers" :key="user.id" class="card">
                    <img :src="'storage/' + user.logo_image" alt="logo" onerror="this.src='storage/placeholder.jpeg';">
                    <h3>{{ user.name }}</h3>
                    <p>{{ user.address }}</p>
                    <router-link :to="{name: 'dishes-user', params: {slug: user.slug}}" class="btn btn-primary">Scopri di più</router-link>
               </div>
           </div>
           <div class="row">
            <router-link v-for="categories in arrCategories" :key="categories.id" class="btn btn-success col-1" :to="{name: 'categories', params: {slug: categories.slug}}">{{ categories.name }}</router-link>
           </div>
        </div> -->
        <!-- prova mia -->
        <div>
            <img src="https://www.ucsf.edu/sites/default/files/styles/article_feature_banner__image/public/2019-09/vegetables-cooking-food-banner-size.jpg"
                alt="" class="w-100" style="width: 100vw; height: 50vh; object-fit: cover; object-position: top center">
            <div class="row border border-2 border-dark">
                <!-- parte sinistra -->
                <div class="col-4 border border-2 border-primary p-3">

                </div>
                <!-- parte destra -->
                <div class="col-8 border border-2 border-success px-5">
                    <h1 class="py-5">Cosa preferisci?</h1>
                    <div class="cards d-flex flex-wrap">
                        <div class="rounded-4 mb-4 me-4 mycard" style="width: 15rem; height: 22rem;"
                            v-for="user in arrUsers" :key="user.id">
                            <!-- singola card -->
                            <img :src="'storage/' + user.logo_image" alt="logo" onerror="this.src='storage/placeholder.jpeg';"
                                class="rounded-4" style="width: 102%; height: 50%; position: relative; left: -2px; top: -2px;">
                            <div class="mx-4">
                                <h4 class="tetx-center">{{ user.name }}</h4>
                                <div class="my-3">{{ user.address }}</div>
                                <div class="my-3">080 219 7961</div>
                            </div>
                            <router-link :to="{ name: 'dishes-user', params: { slug: user.slug } }"
                                class="m-3 rounded-5 text-white px-4 mycard-button">Vedi Menu</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'PageHome',
    data() {
        return {
            arrUsers: [],
            arrCategories: [],
        }
    },
    created() {
        axios.get('/api/dishes')
            .then(response => {
                this.arrUsers = response.data.results;
                this.arrCategories = response.data.categories;
            });
        console.log(this.arrUsers);
    },
}
</script>
<style lang="scss"></style>
