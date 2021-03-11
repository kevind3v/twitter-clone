<?php

// Verify Version PHP
$minPHP = '7.2';
if (phpversion() < $minPHP) {
    die("Your PHP version must be {$minPHP}. Current version: " . phpversion());
}
unset($minPHP);

ob_start();

require __DIR__ . "/vendor/autoload.php";

$route = new CoffeeCode\Router\Router(url(), "::");
$route->namespace("App\Controllers");

/** WEB */
$route->group(null);
$route->get("/", "Web::index", "web.home");
$route->get("/entrar", "Web::login", "web.login");
$route->get("/recuperar-senha", "Web::forget", "web.forget");
/** WEB POST */
$route->post("/entrar", "Web::loginUser", "web.loginUser");
$route->post("/register", "Web::register", "web.register");
$route->get("/confirmar", "Web::confirm", "web.confirm");
$route->get("/obrigado/{email}", "Web::success", "web.success");

/** APP */
$route->group(null);
$route->get("/home", "App::home", "app.home");
$route->get("/u/{user}", "App::profile", "app.profile");
$route->get("/logout", "App::logout", "app.logout");
/** APP POST */
$route->post("/editar-perfil", "App::editProfile", "app.editProfile");
/** APP REQUEST */
$route->post("/upload_post_image", "Api::images", "api.images");


/** Error */
$route->group('/oops');
$route->get("/{errcode}", "Web::error", "web.error");


/** Dispatch Route */
$route->dispatch();

/** ERROR REDIRECT*/
if ($route->error()) {
    $route->redirect("/oops/{$route->error()}");
}

ob_end_flush();
