<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

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

    /**
     *  Forget
    */
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
        if (in_array("", $data)) {
            $json['message'] = "Informe os campos abaixo!!";
            echo json_encode($json);
            return;
        }
        $user = new User();
        $user->bootstrap(
            $data['name'],
            $data['username'],
            $data['email'],
            $data['password']
        );
        if (!$user->register()) {
            $json['message'] = $user->fail()->getMessage();
        } else {
            $json['redirect'] = url();
        }
        echo json_encode($json);
        return;
    }
}
