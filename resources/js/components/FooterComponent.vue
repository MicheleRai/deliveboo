<template>
    <div class="footer-container container-fluid">
        <footer class="container-fluid d-flex align-items-center flex-column justify-content-center alligcontent-center pt-5 pb-2">
            <div class="collegamenti d-flex  gap-5 mb-5">
                <div class="collegamenti-li">
                    <h2>Delive6oo</h2>
                    <ul class="list-unstyled">
                        <li><router-link class="text-decoration-none text-white" :to="{ name: 'restaurants' }">Ristoranti</router-link></li>
                        <li><a class="text-decoration-none text-white" href="">Home</a></li>
                    </ul>
                </div>
                <div class="collegamenti-li">
                    <h2>Info</h2>
                    <ul class="list-unstyled">
                        <li><a class="text-decoration-none text-white" href="">Termini e Condizioni</a></li>
                        <li><a class="text-decoration-none text-white" href="">Privacy policy</a></li>
                    </ul>
                </div>
                <div class="collegamenti-li">
                    <h2>Social</h2>
                    <ul class="list-unstyled">
                        <li><a class="text-decoration-none text-white" href="">Facebook</a></li>
                        <li><a class="text-decoration-none text-white" href="">Instagram</a></li>
                    </ul>
                </div>
                <div class="collegamenti-li">
                    <h2>App</h2>
                    <ul class="list-unstyled">
                        <li><a class="text-decoration-none text-white" href="">
                            <img src="../../../storage/app/public/app-store-badges-it.svg" alt="">
                        </a></li>
                    </ul>
                </div>
            </div>
            <img src="../../../storage/app/public/placeholder.svg" alt="">
            <div class="copyright">2023© Deliveboo | Team 6 e tutti i diritti riservati</div>
        </footer>
    </div>
</template>
<script>
export default {
  data() {
    return {};
  },
};
</script>
<style lang="scss">
.footer-container {
  background-image: url(https://fabrica22.sk/assets/pictures/global/_w1920h840/headerfabrica.png);
  z-index: 1;
  background-size: cover;

  @media (max-width: 390px) {
    padding: 20px;
  }
}

footer {
  h2 {
    color: white;
  }
}

.collegamenti-li {
  margin-right: 20px;

  @media (max-width: 768px) {
    margin-right: 10px;
  }

  @media (max-width: 576px) {
    margin-right: 0;

  }
}

.collegamenti {
  @media (max-width: 768px) {
    justify-content: space-between;
  }

  @media (max-width: 576px) {
    justify-content: center;
    flex-direction: column;
  }
}

img {
  max-width: 100%;
  height: auto;
  margin-bottom: 20px;
}

.text-center {
  text-align: center;
}
</style>
