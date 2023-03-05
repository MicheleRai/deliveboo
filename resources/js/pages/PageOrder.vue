<template>
    <div class="container py-5 my-5">
        <div v-if="arrCart != 0">
            <h1 class="text-md-start text-center">Riepilogo ordine</h1>
            <div class="col-md-12 col-11 m-auto d-flex flex-column align-items-end">
                <div v-for="(objCart, index) in arrCart" :key="index" class="ord my-3 flex-wrap col-md-12 p-3 d-flex align-items-center justify-content-between">
                    <div class="col-12 col-md-5 py-3">
                        <button class="btn col-2 me-5 elimina text-light" @click="deleteObj(index)">X</button>
                        {{ objCart.name }}
                    </div>
                    <div class="col-12 col-md-5 text-center py-3 d-flex align-items-center justify-content-between">
                        <img src="'objCart.image'" alt="img" class="me-5">
                        {{ objCart.price }}&euro;
                    </div>
                </div>
                <div v-show="tot_price" class="ord my-3 col-md-2 p-3 d-flex align-items-center justify-content-end">
                    <div class="col">
                        Totale
                    </div>
                    <div class="col text-end">
                        {{ tot_price }}&euro;
                    </div>
                </div>
            </div>
        </div>
        <h2 v-else class="text-md-start text-center">Non ci sono ancora ordini</h2>
        <form @submit.prevent="submit" id="payment-form" style="margin-top: 2rem;" class="ord col-md-12 col-11 m-auto data py-5 d-flex flex-wrap justify-content-center">
            <div class="form-group mt-3 col-10 col-md-5">
                <label class="text-light" for="name_user">Nome e cognome</label>
                <input type="text" class="form-control" name="name_user" id="name_user" v-model="fields.name_user" />
                <div v-if="errors && errors.name_user" class="text-danger">{{ errors.name_user[0] }}</div>
            </div>

            <div class="form-group my-3 col-10 col-md-5 ms-md-5">
                <label class="text-light" for="address">Indirizzo</label>
                <input type="text" class="form-control" name="address" id="address" v-model="fields.address" />
                <div v-if="errors && errors.address" class="text-danger">{{ errors.address[0] }}</div>
            </div>
             <div class="form-group mt-3 col-10 col-md-5">
                <label class="text-light" for="note">Note</label>
                <textarea class="form-control" name="note" id="note" rows="5" v-model="fields.note"></textarea>
            </div>
            <div class="form-group mt-3 col-10 col-md-5 ms-md-5">
                <label class="text-light" for="email_user">E-mail</label>
                <input type="email" class="form-control" name="email_user" id="email_user" v-model="fields.email_user" />
                <div v-if="errors && errors.email_user" class="text-danger">{{ errors.email_user[0] }}</div>
                <button type="submit" class="btn btn-warning mt-5" :disabled="arrCart.length == 0">Procedi con l'ordine</button>
            </div>





            <div id="bt-dropin">
            </div>
            <input id="nonce" type="hidden" />

            <div v-if="success" class="alert alert-success mt-3">
                Ordine ricevuto!
            </div>

        </form>

    </div>
</template>

<script>

export default {

    data() {
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

        deleteObj(index) {
            this.arrCart.splice(index, 1);
            this.dishes_id.splice(index, 1);
            this.$emit('removePrice');
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

    mounted() {
        axios.get("/payment/checkout").then((response) => {
            var form = document.querySelector("#payment-form");
            braintree.dropin.create(
                {
                    authorization: response.data,
                    selector: "#bt-dropin",
                },
                (createErr, instance) => {
                    if (createErr) {
                        console.log("Create Error", createErr);
                    } else {
                        form.addEventListener("submit", (event) => {
                            event.preventDefault();
                            instance.requestPaymentMethod((err, payload) => {
                                if (err) {
                                    console.log("Request Payment Method Error", err);
                                    return;
                                }
                                document.getElementById("nonce").value = payload.nonce;
                                let data = {
                                    amount: this.tot_price,
                                    payment_method_nonce: payload.nonce,
                                };
                                axios
                                    .post("/payment/checkout", data)
                                    .then((response) => {
                                        console.log("Pagamento avvenuto", response);
                                        this.submit();
                                    })
                                    .catch((error) => {
                                        console.log("Errore pagamento", error.data);
                                    });
                            });
                        });
                    }
                }
            );
        });
    },
}
</script>

<style lang="scss">
.ord{
    border-radius: 10px;
    box-shadow: 10px 10px 16px 0px #ededed;
    font-weight: 700;
    font-family: 'Montserrat', sans-serif;
    border: 1px solid #42AAF5;
}
.data{
    background-color: #42AAF5;
}
.elimina{
    background-color: #07CCBB;
    box-shadow: 10px 10px 16px 0px #ededed;
}
.elimina:hover{
    background-color: #dadada;
    color: #07CCBB;
    box-shadow: 10px 10px 16px 0px #ededed;
}
</style>
