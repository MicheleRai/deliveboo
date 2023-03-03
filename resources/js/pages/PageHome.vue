<template>
    <div>
        <div class="copertina d-flex align-items-left flex-column">
            <h1 class="mb-5">Di cosa hai voglia oggi?</h1>
            <div class="d-flex align-items-left flex-start flex-column h-50 w-50 flex-wrap">
                <router-link v-for="categories in arrCategories" :key="categories.id" class="btn btn-primary mx-3 my-1 px-2 py-3 fs-5"
                    :to="{ name: 'categories', params: { slug: categories.slug } }">{{ categories.name }}</router-link>
            </div>
        </div>
        <div class="container">
            <h2 class="text-center">Ristoranti nella tua zona</h2>
            <div class="row justify-content-center">
                <div class="rounded-4 mycard bg-white col-12" v-for="user in arrUsers"
                    :key="user.id">
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
            </div>

        </div>
        <div
            class="container-fluid d-flex align-items-center flex-column justify-content-center align-content-center py-5 jumbo">
            <img src="../../../storage/app/public/uploads/logo-deliveboo-white.png" alt="">
            <h1 class="fs-1 fw-bolder text center text-light my-5">Vuoi entrare a far parte della nostra famiglia?
            </h1>
            <a href="/register" class="shadow btn btn-light rounded-pill px-5">Registrati</a>
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
        axios.get('/api/dishes/paginate')
            .then(response => {
                this.arrUsers = response.data.results;
                this.arrCategories = response.data.categories;
            });
        console.log(this.arrUsers);
    },
}
</script>
<style lang="scss">
.copertina {
    background-image: url(https://img.freepik.com/free-photo/uncooked-penne-tagliatelle-with-copy-space_23-2148360769.jpg?w=1380&t=st=1677871186~exp=1677871786~hmac=cc37785c47153a319d0a67ae9ab92a7934885275db0d2daea123b5f46c1c8ae9);
}

.jumbo {
    background-image: linear-gradient(#00ccbb, #00ccbb, white);
}

.rounded-pill {
    color: #03b8a9;

}
</style>
