<?php

$this->layout('_theme', ['title' => "Home", "user" => $user]);
?>
<header class="header d-flex justify-content-between">
    <div class="d-flex align-items-center">
        <a href="<?= url_back() ?>">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div class="info d-flex flex-column">
            <strong>Perfil</strong>
        </div>
    </div>
    <?= $this->insert('components::dark-mode') ?>
</header>

<main class="profile-page d-flex flex-column">
    <div class="banner">
        <img alt="<?= "@{$user}" ?>" class="avatar" src="<?= midias("img/profile.png") ?>" />
    </div>
    <div class="profile-data">
        <h1><?= "@{$user}" ?></h1>
    </div>
    <hr>
    <div class="profile-data pt-3 d-flex flex-column text-center">
        <h1>Esta conta não existe</h1>
        <h2>Tente pesquisar por outro.</h2>
    </div>
</main>
