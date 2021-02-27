<?php

$this->layout('_theme', ["title" => "Entrar no Twitter"]);
?>

<main id="login" class="container pt-4">
    <form action="#" method="POST" id="login">
        <div class="form m-auto px-md-4">
            <i class="fab fa-twitter"></i>
            <h3>Entrar no Twitter</h3>

            <p class="ajax_response"></p>

            <div class="form-group">
                <input required id="user" class="form-control i-form" type="text" />
                <label for="user">E-mail ou nome de usuário</label>
            </div>
            <div class="form-group">
                <input required autocomplete="off" id="passwd" class="form-control i-form" type="password" />
                <label for="passwd">Senha</label>
            </div>
            <button class="btn btn-block" type="submit">Conecte-se</button>
            <div class="row justify-content-center mt-3">
                <a class="link-login mr-3" href="<?= $router->route('web.forget') ?>">Esqueceu a senha?</a>
                <a class="link-login" data-toggle="modal" data-target="#sign-in-modal">Cadastre-se no Twitter</a>
            </div>
        </div>
    </form>
</main>

<?= $this->insert('components::sign-in') ?>