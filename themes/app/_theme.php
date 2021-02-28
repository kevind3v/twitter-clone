<?php

use App\Models\Auth;

?>
<!DOCTYPE html>
<html lang="pt-br" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?> / Twitter</title>
    <link rel="shortcut icon" href="<?= midias('/img/favicon.ico') ?>" type="image/x-icon">
    <link
      href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
      rel="stylesheet"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="<?= package('normalize.css/normalize.css') ?>" />
    <link rel="stylesheet" href="<?= package('bootstrap/dist/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= package('@fortawesome/fontawesome-free/css/all.min.css') ?>" />
    <link rel="stylesheet" href="<?= themes("assets/style.min.css", VIEWS['app']) ?>">
</head>

<body>

    <!-- Start Loading -->
    <div id="loading">
        <div id="spinner"></div>
    </div>
    <!-- End Loading -->

    <main id="feed" class="container-fluid px-0">
        <div class="d-flex wrapper justify-content-center">
            <?= $this->insert('components::menubar', ["home" => "active", "user" => Auth::user()->data()]) ?>
            <section class="content d-flex flex-column">
                <?= $this->section('content') ?>
                <?= $this->insert('components::bottom-menu') ?>
            </section>
            <?= $this->insert('components::sidebar') ?>
        </div>
    </main>

    <!-- JS -->
    <script src="<?= package('jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= package('bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= package('jquery-form/dist/jquery.form.min.js') ?>"></script>
    <script src="<?= themes('assets/scripts.min.js', VIEWS['app']) ?>"></script>
</body>

</html>