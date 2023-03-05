<template>
    <div>
        <div class="contenitore">
            <img src="../../../public/images/chef.webp"
                alt="" class="w-100" style="width: 100vw; height: 60vh; object-fit: cover; object-position: center; opacity: 0.8">
            <div class="row bg-white contenitoremio">
                <!-- parte sinistra -->
                <div class="col-3 p-5 col-sinistra">
                    <div>
                        <h3 class="grey-line">Categorie</h3>
                        <div class="categories d-flex flex-column">
                            <div v-for="categories in arrCategories" :key="categories.id" class="fs-5 lh-lg">
                                <router-link class="col-1 text-decoration-none category" :to="{name: 'categories', params: {slug: categories.slug}}">{{ categories.name }}</router-link>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- parte destra -->
                <div class="col-9 px-5">
                    <h1 class="py-5">Cosa preferisci?</h1>
                    <div class="cards d-flex flex-wrap">
                        <div class="rounded-4 mb-4 me-4 mycard" style="width: 14rem; height: 27rem;"
                            v-for="user in arrUsers" :key="user.id"
                        >
                            <img :src="'storage/' + user.logo_image" alt="logo" onerror="this.src='storage/placeholder.jpeg';"
                            class="rounded-4" style="width: 100%; height: 50%">
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

<style lang="scss">
.grey-line{
    border-bottom: 5px solid lightgrey;
    width: fit-content;
    padding-bottom: 0.8rem;
}

.col-sinistra{
    position: relative;
    left: 3rem;
}

</style>
