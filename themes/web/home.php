<?php

$this->layout('_theme');
?>
<div id="main" class="container-fluid h-100">
    <main class="row">
        <div class="col-lg-4 col-xl-6 banner order-2 order-lg-1">
            <div class="row h-100 justify-content-center align-items-center">
                <img class="brand" src="<?= midias('img/svg/bird-white.svg') ?>" alt="Twitter" />
            </div>
        </div>
        <div class="col-lg-8 col-xl-6 order-1 order-lg-2">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col middle m-5">
                    <i class="fab fa-twitter"></i>
                    <h1>Acontecendo agora</h1>
                    <h4>Junte-se ao Twitter hoje.</h4>
                    <a class="btn btn-sign-up" data-toggle="modal" data-target="#sign-in-modal">Inscrever-se</a>
                    <a class="btn outlined" href="<?= $router->route('web.login') ?>">Conectar-se</a>
                </div>
            </div>
        </div>
    </main>
    <footer class="my-2">
        <div class="row justify-content-center">
            <a class="nav-link" href="#">About</a>
            <a class="nav-link" href="#">Help Center</a>
            <a class="nav-link" href="#">Blog</a>
            <a class="nav-link" href="#">Status</a>
            <a class="nav-link" href="#">Jobs</a>
            <a class="nav-link" href="#">Terms</a>
            <a class="nav-link" href="#">Privacy Policy</a>
            <a class="nav-link" href="#">Cookies</a>
            <a class="nav-link" href="#">Ads Info</a>
            <a class="nav-link" href="#">Brand</a>
            <a class="nav-link" href="#">Apps</a>
            <a class="nav-link" href="#">Advertise</a>
            <a class="nav-link" href="#">Marketing</a>
            <a class="nav-link" href="#">Business</a>
            <a class="nav-link" href="#">Developers</a>
            <a class="nav-link" href="#">Directory</a>
            <a class="nav-link" href="#">Settings</a>
            <span class="nav-link">© 2021 Twitter, Inc</span>
        </div>
    </footer>
</div>

<?= $this->insert('./components/sign-in') ?>