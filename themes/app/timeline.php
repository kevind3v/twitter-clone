<?php

$this->layout('_theme', ["page" => "home", 'title' => "Home"]);
?>

<header class="header d-flex justify-content-between pl-0">
    <div class="info d-flex flex-wrap align-items-center">
        <a href="#" class="profile-avatar">
            <img alt="<?= $user->user ?>" class="avatar" src="<?= photo($user->photo) ?>" />
        </a>
        <strong>Home</strong>
    </div>
    <?= $this->insert('components::dark-mode') ?>
</header>

<section class="tweet-box d-flex">
    <a href="<?= $router->route('app.profile', ['user' => $user->user]) ?>">
        <img alt="<?= $user->user ?>" class="avatar" src="<?= photo($user->photo) ?>" />
    </a>
    <article class="tweet-box-content">
        <form action="#">
            <textarea class="textarea" name="tweet" placeholder="O que está acontecendo?"></textarea>
            <div class="tweet-box-buttons d-flex align-items-center justify-content-between flex-wrap">
                <div class="btn-icons d-flex flex-wrap">
                    <div class="btn-icon">
                        <img src="<?= midias('img/svg/image.svg') ?>" alt="Image" />
                    </div>
                    <div class="btn-icon">
                        <img src="<?= midias('img/svg/smile.svg') ?>" alt="Emoji" />
                    </div>
                </div>
                <button class="btn btn-tweet">Tweet</button>
            </div>
        </form>
    </article>
</section>
<div class="divisor"></div>
<section class="tweets d-flex flex-column flex-shrink-0">
    <?= $this->insert('components::tweet') ?>
</section>
</section>