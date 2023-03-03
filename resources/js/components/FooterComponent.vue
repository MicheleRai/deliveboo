<template>
    <div class="footer-container container-fluid">
        <footer class="container-fluid d-flex align-items-center flex-column justify-content-center alligcontent-center pt-5 pb-2">
            <div class="collegamenti d-flex  gap-5 mb-5">
                <div class="collegamenti-li">
                    <h2>Delive6oo</h2>
                    <ul class="list-unstyled">
                        <li><a class="text-decoration-none text-white" href="">Ristornati</a></li>
                        <li><a class="text-decoration-none text-white" href="">Piatti</a></li>
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
                        <li><a class="text-decoration-none text-white" href="">icona</a></li>
                        <li><a class="text-decoration-none text-white" href="">icona</a></li>
                    </ul>
                </div>
            </div>
            <!-- <img src="../../../public/storage/uploads/footer.svg" alt=""> -->
            <div class="copyright text-muted">2023© Deliveboo | Team 6 e tutti i diritti riservati</div>
        </footer>
    </div>
</template>

<script>
export default {
    data () {
    return {

    }
    }
}
</script>

<style>
.footer-container{
    background: #1d1d1d;
}
footer{
    background-image: url('../../../public/storage/uploads/footer.svg');
    z-index: 1;
    background-size: cover;
}
h2{
    color: white;
}
</style>
