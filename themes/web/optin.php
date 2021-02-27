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
            <?php if (!empty($data->link)) : ?>
                <a href="<?= $data->link; ?>" title="<?= $data->linkTitle ?>"
               class="btn outlined optin_btn mt-4"><?= $data->linkTitle ?></a>
            <?php else : ?>
                <a class="btn optin_btn outlined mt-4"
               title="Continue navegando" href="<?= url() ?>">Continue navegando</a>
            <?php endif ?>
        </div>
    </div>
</article>