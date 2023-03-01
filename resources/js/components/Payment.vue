<template>
<div>
    <v-braintree
    authorization="sandbox_bn4jmf5k_hp3cmvfqtnngydmx"
    @success="onSuccess"
    @error="onError"
    >

    </v-braintree>
</div>
</template>

<script>
export default {
    methods: {
    onSuccess (payload) {
      let nonce = payload.nonce;
      console.log(nonce);
      // Do something great with the nonce...
    },
    onError (error) {
      let message = error.message;
      // Whoops, an error has occured while trying to get the nonce
    }
  }
}
</script>

<style>

</style>
