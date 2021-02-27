<?php

$this->layout('_theme');
$this->insert('components::header', ["description" => "Oops!! Deu erro {$error->code}"])
?>

<article class="not_found">
    <div class="container content">
        <header class="not_found_header">
            <h2><?= $error->title; ?></h2>
            <p><?= $error->message; ?></p>
            <a class="btn outlined mt-4"
               title="Continue navegando" href="<?= url() ?>">Continue navegando</a>
        </header>
    </div>
</article>