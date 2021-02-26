<?php

$this->layout('_theme');
?>

<header class="header navbar-light bg-white">
    <nav class="navbar container">
        <span class="navbar-brand" href="#">
            <a href="#">
                <img src="<?= midias('img/svg/bird.svg') ?>" width="25" height="25" class="d-inline-block align-top" alt="" />
            </a>
            Redefinir Senha
        </span>
    </nav>
</header>
<main id="forget" class="container mt-4">
    <div class="content">
        <form class="py-4" action="#" method="POST">
            <h3>Encontre sua conta do Twitter</h3>
            <p>Digite seu e-mail, número de celular ou nome de usuário.</ṕ>
            <div class="form-group">
                <input required id="user" class="form-control" type="text" />
            </div>
            <button class="btn mt-4" type="submit">Buscar</button>
        </form>
    </div>
</main>