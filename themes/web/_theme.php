<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Twitter. É o que está acontecendo / Twitter</title>
    <link rel="shortcut icon" href="<?= midias('/img/favicon.ico') ?>" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= package('normalize.css/normalize.css')?>" />
    <link rel="stylesheet" href="<?= package('bootstrap/dist/css/bootstrap.min.css')?>" />
    <link rel="stylesheet" href="<?= package('@fortawesome/fontawesome-free/css/all.min.css')?>" />
    <link rel="stylesheet" href="<?= themes("assets/style.min.css") ?>">
  </head>
  <body>
    
    <?= $this->section('content') ?>

    <!-- JS -->
    <script src="<?= package('jquery/dist/jquery.min.js')?>"></script>
    <script src="<?= package('bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?= themes('assets/scripts.min.js')?>"></script>
</body>
</html>
