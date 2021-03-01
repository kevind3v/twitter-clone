<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Auth;
use App\Models\User;
use BrBunny\BrUploader\Base64;

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
        $this->view->show("home", [
            "user" => Auth::user()->data(),
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

        if ($user->user === Auth::user()->data()->user) {
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

    public function editProfile(array $data): void
    {
        if (empty($data['name'])) {
            $json['message'] = "Nome é obrigatório";
            echo json_encode($json);
            return;
        }
        try {
            $user = (new User())->findById(Auth::user()->data()->id);
            $user->name = $data['name'];
            $user->bio = $data['bio'];
            $user->location = $data['location'];
            if (!empty($data['avatar'])) {
                $image = (new Base64("uploads", "images"))
                ->upload($data['avatar'], $user->user);
                Base64::remove($user->photo ?? "");
                $user->photo = $image;
            }
            if (!empty($data['banner'])) {
                $image = (new Base64("uploads", "images"))
                ->upload($data['banner'], $user->user . "-banner");
                Base64::remove($user->banner ?? "");
                $user->banner = $image;
            }

            if ($user->save()) {
                $json['error'] = false;
                echo json_encode($json);
                return;
            }
        } catch (\Exception $e) {
            $json['message'] = $e->getMessage();
            echo json_encode($json);
            return;
        }
    }

    /** Logout  */
    public function logout(): void
    {
        Auth::logout();
        redirect(url());
    }
}
