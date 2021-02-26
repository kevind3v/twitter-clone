<?php

define("ENVIRONMENT", $_ENV['environment']);

/** ABOUT */
define("SITE", [
    "name" =>  $_ENV['app.name'],
    "title" =>  $_ENV['app.title'],
    "desc" =>  $_ENV['app.desc'],
    "locale" => $_ENV['app.lang'],
    "url" => [
        "base" => $_ENV['app.url.domain'],
        "dev" => $_ENV['app.url.root']
    ],
]);

/** Constant DateLayer */
define("DATA_LAYER_CONFIG", [
    "driver" => $_ENV['db.driver'],
    "host" => $_ENV['db.hostname'],
    "port" => $_ENV['db.port'],
    "dbname" => $_ENV['db.name'],
    "username" => $_ENV['db.username'],
    "passwd" => $_ENV['db.password'],
    "options" => [
        // PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

/** Constant E-mail */
define("BRMAILER", [
    "host" => $_ENV['mail.host'],
    "port" => $_ENV['mail.port'],
    "user" => $_ENV['mail.username'],
    "passwd" => $_ENV['mail.password'],
    "from" => [
        "name" => $_ENV['mail.fromName'],
        "address" => $_ENV['mail.from']
    ],
    "reply" => [
        "name" => $_ENV['mail.fromName'],
        "address" => $_ENV['mail.from']
    ],
    "options" => [
        "language" => $_ENV['mail.lang'], // Set Language Email
        "smtp_debug" => $_ENV['mail.debug'], // Enable verbose debug output
        "is_html" => $_ENV['mail.html'], // Set email format to HTML
        "auth" => $_ENV['mail.auth'], // Enable SMTP authentication
        "secure" => $_ENV['mail.secure'], // Enable TLS encryption
        "charset" => $_ENV['mail.charset'] // Set email charset
    ]
]);

/** Constant Date */
define("DATE", [
    "br" => "d/m/Y H:i:s",
    "app" => "Y-m-d H:i:s"
]);

/** Constant password */
define("PASSWD", [
    "min" => 8,
    "max" => 40,
    "algo" => PASSWORD_DEFAULT,
    "option" => ["const" => 10]
]);


/** Constant template */
define('VIEWS', [
    "shared" => dirname(__DIR__, 2) . "/shared/views/",
    "default" => dirname(__DIR__, 2) . "/themes/",
    "web" => "web"
]);
