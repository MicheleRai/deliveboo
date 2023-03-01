<template>
    <div class="container">
        <div class="col-6 offset-3">
           <div id="dropin-container"></div>
           <button id="submit-button">Request payment method</button>
        </div>
    </div>
</template>
<script>
//import braintree from 'braintree-web';
import braintree from 'braintree-web-drop-in';
import paypal from 'paypal-checkout';

export default {
    data() {
        return {
            hostedFieldInstance: false,
            nonce: "",
            error: ""
        }
    },
    methods: {
        payWithCreditCard() {
            if (this.hostedFieldInstance) {
                this.error = "";
                this.nonce = "";

                this.hostedFieldInstance.tokenize().then(payload => {
                    console.log(payload);
                    this.nonce = payload.nonce;
                })
                    .catch(err => {
                        console.error(err);
                        this.error = err.message;
                    })
            }
        }
    },
    mounted() {
        braintree.create({
            authorization: "sandbox_bn4jmf5k_hp3cmvfqtnngydmx"
        })
            .then(clientInstance => {
                let options = {
                    client: clientInstance,
                    styles: {
                        input: {
                            'font-size': '14px',
                            'font-family': 'Open Sans'
                        }
                    },
                    fields: {
                        number: {
                            selector: '#creditCardNumber',
                            placeholder: 'Enter Credit Card'
                        },
                        cvv: {
                            selector: '#cvv',
                            placeholder: 'Enter CVV'
                        },
                        expirationDate: {
                            selector: '#expireDate',
                            placeholder: '00 / 0000'
                        }
                    }
                }
                return Promise.all([
                    braintree.hostedFields.create(options),
                    braintree.paypalCheckout.create({ client: clientInstance })
                ])
            })
            .then(instances => {

                const hostedFieldInstance = instances[0];
                const paypalCheckoutInstance = instances[1];
                // Use hostedFieldInstance to send data to Braintree
                this.hostedFieldInstance = hostedFieldInstance;
                // @todo: Setup PayPal Button
                return paypal.Button.render({
                    env: 'sandbox',
                    style: {
                        label: 'paypal',
                        size: 'responsive',
                        shape: 'rect'
                    },
                    payment: () => {
                        return paypalCheckoutInstance.createPayment({
                            flow: 'checkout',
                            intent: 'sale',
                            amount: 10,
                            displayName: 'Braintree Testing',
                            currency: 'USD'
                        })
                    },
                    onAuthorize: (data, options) => {
                        return paypalCheckoutInstance.tokenizePayment(data).then(payload => {
                            console.log(payload);
                            this.error = "";
                            this.nonce = payload.nonce;
                        })
                    },
                    onCancel: (data) => {
                        console.log(data);
                        console.log("Payment Cancelled");
                    },
                    onError: (err) => {
                        console.error(err);
                        this.error = "An error occurred while processing the paypal payment.";
                    }
                }, '#paypalButton')
            })
            .catch(err => {
            });
    }
}
</script>
<style>
body {
    padding: 20px;
}
</style>
