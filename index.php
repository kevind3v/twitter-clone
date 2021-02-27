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

$route->group(null);
$route->get("/", "Web::index", "web.home");
$route->get("/entrar", "Web::login", "web.login");
$route->get("/recuperar-senha", "Web::forget", "web.forget");

/** WEB POST */
$route->post("/register", "Web::register", "web.register");
$route->get("/confirmar", "Web::confirm", "web.confirm");

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
