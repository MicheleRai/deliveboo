<template>
    <div>
        <div class="copertina mb-3 d-flex justify-content-center align-items-start">
            <h1 class="my-2 text-white align-self-sm-end">Di cosa hai voglia oggi?</h1>
        </div>
        <div class="container pb-5">
            <div class="d-flex justify-content-center w-100 flex-wrap">
                <div class="category-card me-3 mt-5 rounded-3 mb-3" style="width: 125px; height: 125px;" v-for="categories in arrCategories" :key="categories.id">
                    <router-link :to="{ name: 'categories', params: { slug: categories.slug } }">
                        <img :src="'storage/' + categories.image" onerror="this.src='storage/placeholder.jpeg';" alt="category" class="category-img rounded-3">
                    </router-link>
                    <div class="text-dark fs-4 text-center">{{ categories.name }}</div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <h2 class="text-center mb-5">Ristoranti nella tua zona</h2>
            <div class="cards d-flex justify-content-center flex-wrap">
                        <div class="rounded-4 mb-4 me-4 mycard" style="width: 14rem; height: 28rem;"
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
            <div class="text-center py-5 fs-5 d-flex justify-content-center">
                <router-link class="restaurant-link see-all-link" :to="{ name: 'restaurants' }">Vedi tutti i ristoranti</router-link>
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
    background-image: url(https://img.freepik.com/free-photo/vintage-old-rustic-cutlery-dark_1220-4886.jpg?w=1800&t=st=1681937508~exp=1681938108~hmac=b964e01788de9eec4f9c9762fd505476bfdfe3913349555724e97b6f54dfaeca);
}

.jumbo {
    background-image: linear-gradient(#00ccbb, #00ccbb, white);
}

.rounded-pill {
    color: #03b8a9;
}

.category-img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.category-card{
    border: 2px solid #03b8a9;
    &:hover{
        opacity: 0.8;
    }
}

.restaurant-link{
    padding: .5em 1em;
    background-color: #3fa9f5;
    color: white;
    text-decoration: none;
    border-radius: 10px;
    margin: 0 1em;
    font-weight: bold;
  }
  .restaurant-link:hover{
    background-color: #00ccbb;
    color: white;
  }

.see-all-link{
    padding: 1rem;
    width: 25%;
    border-radius: 20px;
}
</style>
