<?php
$this->layout('_theme', [
    "page" => ($auth) ? "profile" : "default",
    "title" => "{$user->name} (@{$user->user})",
    "user" => $user
]);
?>

<header class="header d-flex justify-content-between">
    <div class="d-flex align-items-center">
        <a href="<?= url_back() ?>">
            <svg fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div class="info d-flex flex-column">
            <strong><?= $user->name ?></strong>
            <span>625 Tweets</span>
        </div>
    </div>
    <?= $this->insert('components::dark-mode') ?>
</header>

<section class="profile-page d-flex flex-column">
    <div class="banner" 
    style="background-image: <?= (!empty($user->banner)) ? "url('" . url($user->banner) . "')" : "unset" ?>;">
        <img alt="<?= $user->user ?>" class="avatar" src="<?= photo($user->photo) ?>" />
    </div>
    <div class="profile-data d-flex flex-column">
        <?php if ($auth) : ?>
            <button data-toggle="modal" data-target="#edit-profile" class="btn outlined edit-profile">
                Editar Perfil
            </button>
        <?php else : ?>
            <button class="btn outlined edit-profile">
                Seguir
            </button>
        <?php endif; ?>

        <h1><?= $user->name ?></h1>
        <h2>@<?= $user->user ?></h2>

        <?php if (!empty($user->bio)) : ?>
            <p><?= $user->bio ?></p>
        <?php endif; ?>

        <ul>
            <?php if (!empty($user->location)) : ?>
                <li>
                    <span class="material-icons-outlined"> location_on </span>
                    Itaquaquecetuba, São Paulo - Brasil
                </li>
            <?php endif; ?>
            <li>
                <span class="material-icons">date_range</span>
                Entrou em <?= date_str($user->created_at) ?>
            </li>
        </ul>

        <div class="followage d-flex">
            <span>segundo <strong>94</strong></span>
            <span><strong>194</strong> seguidores</span>
        </div>
    </div>
</section>

<div class="tabs">
    <span class="tab">Tweets</span>
</div>

<section class="tweets d-flex flex-column flex-shrink-0">
    <?= $this->insert('components::tweet') ?>
</section>



<section class="modal fade" id="edit-profile" tabindex="-1" role="dialog" 
aria-labelledby="edit-profileTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered app-modal" role="document">
        <div class="modal-content">
            <form action="<?= $router->route('app.editProfile') ?>" id="edit-profile" class="form">
                <div class="modal-header px-3 align-items-center justify-content-between">
                    <div class="title d-flex align-items-center">
                        <button type="button" data-dismiss="modal" aria-label="Close" class="btn-modal">
                            <img src="<?= midias('img/svg/close-outline.svg') ?>" alt="" />
                        </button>
                        <strong>Editar Perfil</strong>
                    </div>
                    <button type="submit" class="btn btn-save">Save</button>
                </div>
                <div class="modal-body p-0 profile-page">
                    <div class="banner" id="profile_banner"
                    style="background-image: <?= (!empty($user->banner)) ? "url('" . url($user->banner) . "')" : "unset" ?>;">
                        <label for="banner" class="edit-photo-icon" data-toggle="tooltip" data-placement="bottom" 
                        title="Foto de Capa">
                            <img src="<?= midias('img/svg/camera.svg') ?>" alt="Foto" />
                        </label>
                        <label class="edit-photo" for="avatar">
                            <img id="profile_avatar" alt="<?= $user->user ?>" class="avatar" 
                            src="<?= photo($user->photo) ?>" 
                            data-toggle="tooltip" data-placement="bottom" title="Mudar Foto" />
                        </label>
                    </div>
                    <div class="forms">
                        <p class="ajax_response"></p>
                        <div class="form-group">
                            <input type="file" class="file-image image_cropper" id="banner">
                            <input type="hidden" value="" name="banner" id="user_banner">
                        </div>
                        <div class="form-group">
                            <input type="file" class="file-image image_cropper" id="avatar">
                            <input type="hidden" value="" name="avatar" id="user_avatar">
                        </div>
                        <div class="form-group">
                            <input id="name" name="name" placeholder="Nome" class="form-control i-form" value="<?= $user->name ?>" type="text" />
                            <label for="name">Nome</label>
                        </div>
                        <div class="form-group">
                            <textarea maxlength="160" name="bio" placeholder="Bio" id="bio" rows="4" class="form-control i-form"><?= $user->bio ?></textarea>
                            <label class="bio" for="bio">Bio</label>
                            <span class="count count-bio"><span>0</span>/160</span>
                        </div>
                        <div class="form-group">
                            <input id="location" value="<?= $user->location ?>" name="location" placeholder="Localização" class="form-control i-form" type="text" />
                            <label class="location" for="location">Localização</label>
                            <span class="count count-location"><span>0</span>/30</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<section class="modal fade" id="cropper_avatar" tabindex="-1" 
role="dialog" aria-labelledby="edit-profileTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered app-modal" role="document">
        <div class="modal-content">

            <div class="modal-header px-3 align-items-center justify-content-between">
                <div class="title d-flex align-items-center">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn-modal">
                        <img src="<?= midias('img/svg/back.svg') ?>" alt="" />
                    </button>
                    <strong>Editar Perfil</strong>
                </div>
                <button type="button" id="_avatar" class="btn btn-save crop_avatar">Aplicar</button>
            </div>
            <div class="modal-body p-0">
                <img src="" id="image_avatar">
            </div>

        </div>
    </div>
</section>

<section class="modal fade" id="cropper_banner" tabindex="-1" role="dialog" 
aria-labelledby="edit-profileTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered app-modal" role="document">
        <div class="modal-content">
            <div class="modal-header px-3 align-items-center justify-content-between">
                <div class="title d-flex align-items-center">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn-modal">
                        <img src="<?= midias('img/svg/back.svg') ?>" alt="" />
                    </button>
                    <strong>Editar Perfil</strong>
                </div>
                <button type="button" id="_banner" class="btn btn-save crop_banner">Aplicar</button>
            </div>
            <div class="modal-body p-0">
                <img src="" id="image_banner">
            </div>
        </div>
    </div>
</section>