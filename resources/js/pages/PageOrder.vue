<template>
    <div class="container">
        <div v-for="(objCart, index) in arrCart" :key="index" class="col-5 m-auto">
            <button class="btn btn-danger col-1" @click="deleteObj(index)">X</button>
            {{ objCart.name }} - {{ objCart.price }}&euro;
        </div>

        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="name_user">Nome e cognome</label>
                <input type="text" class="form-control" name="name_user" id="name_user" v-model="fields.name_user"/>
                <div v-if="errors && errors.name_user" class="text-danger">{{ errors.name_user[0] }}</div>
            </div>

            <div class="form-group">
                <label for="email_user">E-mail</label>
                <input type="email" class="form-control" name="email_user" id="email_user" v-model="fields.email_user"/>
                <div v-if="errors && errors.email_user" class="text-danger">{{ errors.email_user[0] }}</div>
            </div>

            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input type="text" class="form-control" name="address" id="address" v-model="fields.address"/>
                <div v-if="errors && errors.address" class="text-danger">{{ errors.address[0] }}</div>
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <textarea class="form-control" name="note" id="note" rows="5" v-model="fields.note"></textarea>
            </div>

            <div v-show="total">Totale: {{ total.toFixed(2) }}&euro;
            </div>

            <button type="submit" class="btn btn-primary" :disabled="arrCart.length == 0">Procedi con l'ordine</button>
            <div v-if="success" class="alert alert-success mt-3">
                Ordine ricevuto!
            </div>
        </form>
        <payment/>
    </div>
</template>

<script>
import Payment from '../components/Payment.vue';


export default {

    components: {
        Payment,
    },

    data(){
       return {
        fields: {
            name_user: null,
            email_user: null,
            address: null,
            note: null,
            tot_price: this.tot_price,
            dishes_id: this.dishes_id,
        },
        errors: {},
        success: false,
        loaded: true,
        }
    },

    props: {
        arrCart: Array,
        dishes_id: Array,
        tot_price: String,
    },

    methods: {

        deleteObj(index){
            this.arrCart.splice(index, 1);
            this.dishes_id.splice(index, 1);
        },

        submit() {
            if (this.loaded) {
                this.loaded = false;
                this.success = false;
                this.errors = {};
                axios.post('/api/submit', this.fields).then(response => {
                    this.fields = {}; //Clear input fields.
                    this.loaded = true;
                    this.success = true;
                    this.$emit('emptyCart');
                }).catch(error => {
                    this.loaded = true;
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    }
                });
            }
        },

    },

    computed: {
        total() {
            return this.arrCart.reduce((acc, item) => acc + parseFloat(item.price), 0);
        }
    }
}
</script>

<style lang="scss">
@import '~bootstrap/scss/bootstrap';

</style>
