<?php

use MatthiasMullie\Minify\CSS;
use MatthiasMullie\Minify\JS;

//CSS
$minCSS = new CSS();
$minCSS->add(dirname(__DIR__, 3) . "/shared/styles/boot.css");

//Theme CSS
$cssDir = scandir(VIEWS['default'] . VIEWS['web'] . "/assets/css");

foreach ($cssDir as $css) {
    $cssFile = VIEWS['default'] . VIEWS['web'] . "/assets/css/{$css}";
    $minCSS->add(minifyCSS($cssFile));
}

//JS
$minJS = new JS();
$minJS->add(dirname(__DIR__, 3) . "/shared/scripts/main.js");
$minJS->add(dirname(__DIR__, 3) . "/shared/scripts/inputs.js");
$minJS->add(dirname(__DIR__, 3) . "/shared/scripts/theme.js");
$minJS->add(dirname(__DIR__, 3) . "/shared/scripts/form.js");

//Theme CSS
$jsDir = scandir(VIEWS['default'] . VIEWS['web'] . "/assets/js");

foreach ($jsDir as $js) {
    $jsFile = VIEWS['default'] . VIEWS['web'] . "/assets/js/{$js}";
    $minJS->add(minifyJS($jsFile));
}

$minCSS->minify(VIEWS['default'] . VIEWS['web'] . "/assets/style.min.css");
$minJS->minify(VIEWS['default'] . VIEWS['web'] . "/assets/scripts.min.js");
