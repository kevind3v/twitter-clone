<?php

$this->layout('_theme');
$this->insert('components::header', ["description" => $data->title])
?>

<article class="optin_page">
    <div class="container content">
        <div class="optin_page_content">
            <img alt="<?= $data->description; ?>" title="<?= $data->description; ?>"
                 src="<?= $data->image; ?>"/>

            <h1><?= $data->description; ?></h1>
            <p><?= $data->body; ?></p>
            <a class="btn outlined mt-4"
               title="Continue navegando" href="<?= url() ?>">Continue navegando</a>
        </div>
    </div>
</article>