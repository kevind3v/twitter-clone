<?php

namespace App\Core;

use BrBunny\BrPlates\BrPlates;

class Controller
{
    /** @var BrPlates */
    protected $view;

    public function __construct($router, string $view = VIEWS['default'])
    {
        $this->view = new BrPlates($view);
        $this->view->data(["router" => $router]);
    }

    public function error(array $data): void
    {
        $error = new \stdClass();
        $error->code = $data['errcode'];
        $error->title = "Desculpe, conteúdo indispinível!!";
        $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento ou foi removido :/";

        echo $this->view->render("error", [
            "title" => "Oops | {$data['errcode']}",
            "error" => $error,
        ]);
    }
}
