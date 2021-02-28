<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Auth;
use App\Models\User;

class Web extends Controller
{
    /** Web Constructor */
    public function __construct($router)
    {
        parent::__construct($router, VIEWS['default'] . VIEWS['web']);
        $this->view->path("components", VIEWS['default'] . VIEWS['web'] . "/components");
        if (Auth::user()) {
            redirect("/home");
        }
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

    /** Login */
    public function loginUser(array $data): void
    {
        if (in_array("", $data)) {
            $json['message'] = "Informe os campos abaixo!!";
            echo json_encode($json);
            return;
        }
        $auth = new Auth();
        if (!$auth->login($data['user'], $data['password'])) {
            $json['message'] = $auth->fail()->getMessage();
        } else {
            $json['redirect'] = url("home");
        }
        echo json_encode($json);
        return;
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
        $auth = new Auth();
        $user = new User();
        $user->bootstrap(
            $data['name'],
            $data['username'],
            $data['email'],
            $data['password']
        );
        if (!$auth->register($user)) {
            $json['message'] = $auth->fail()->getMessage();
        } else {
            $json['redirect'] = url('/confirmar');
        }
        echo json_encode($json);
        return;
    }

    public function confirm(): void
    {
        $this->view->show("optin", [
            "data" => (object)[
                "title" => "Confirmar E-mail",
                "description" => "Falta pouco! Confirme seu cadastro :)",
                "body" => "Enviamos um link de confirmação para seu e-mail. 
                Acesse e siga as instruções para concluir seu cadastro.",
                "image" => midias("img/svg/mail.svg")
            ]
        ]);
    }

    public function success(array $data): void
    {
        $email = base64_decode($data['email']);
        $user = (new User())->findByEmail($email);

        if ($user && $user->status != "confirmed") {
            $user->status = "confirmed";
            $user->save();
        } else {
            redirect(url());
        }

        $this->view->show("optin", [
            "data" => (object)[
                "title" => "Conta confirmada!!",
                "description" => "Agora você já pode fazer muitos tweets :)",
                "body" => "Bem-vindo(a) a sua conta do twitter clone!!",
                "image" => midias("img/svg/success.svg"),
                "link" => url('/entrar'),
                "linkTitle" => "Acessar Conta"
            ]
        ]);
    }
}
