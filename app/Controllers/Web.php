<?php

namespace App\Controllers;

use App\Core\Controller;

class Web extends Controller
{
    /** Web Constructor */
    public function __construct($router)
    {
        parent::__construct($router, VIEWS['default'] . VIEWS['web']);
    }

    /** Index */
    public function index(): void
    {
        $this->view->show("home");
    }

    /** Login */
    public function login(): void
    {
        $this->view->show("login");
    }

    /** Forget */
    public function forget(): void
    {
        $this->view->show("forget");
    }


    /**
     * Create User
     *
     * @param array $data
     */
    public function register(array $data): void
    {
        var_dump($data);
    }
}
