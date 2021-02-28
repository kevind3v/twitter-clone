<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Auth;
use App\Models\User;

class App extends Controller
{
    /** Web Constructor */
    public function __construct($router)
    {
        parent::__construct($router, VIEWS['default'] . VIEWS['app']);
        $this->view->path("components", VIEWS['default'] . VIEWS['app'] . "/components");
        if (!Auth::user()) {
            redirect(url('/entrar'));
        }
    }

    /** App Home */
    public function home(): void
    {
        // var_dump(Auth::user());
        // echo "<a href='" . url("/app/sair") . "'>Sair</a>";
        $this->view->show("home", [
            "user" => Auth::user()->data()
        ]);
    }

    public function profile(array $data): void
    {
        $data = filter_var($data['user'], FILTER_SANITIZE_STRIPPED);
        $user = (new User())->findByUser($data);
        if (!$user) {
            $this->view->show("not-user", [
                "auth" => false,
                "user" => $data
            ]);
            return;
        }

        if ($user->user == Auth::user()->data()->user) {
            $this->view->show("profile", [
                "auth" => true,
                "user" => Auth::user()->data()
            ]);
            return;
        }

        $this->view->show("profile", [
            "auth" => false,
            "user" => $user->data()
        ]);
    }

    /** Logout  */
    public function logout(): void
    {
        Auth::logout();
        redirect(url());
    }
}
