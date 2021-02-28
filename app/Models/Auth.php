<?php

namespace App\Models;

use App\Core\Session;
use CoffeeCode\DataLayer\DataLayer;

class Auth extends DataLayer
{
    /** Auth Constructor */
    public function __construct()
    {
        parent::__construct("users", ["name", "user", "email", "password"]);
    }

    public static function user(): ?User
    {
        $session = new Session();
        if (!$session->has("authUser")) {
            return null;
        }

        return (new User())->findById($session->authUser);
    }

    public function login(string $user, string $password): bool
    {
        try {
            if (!is_passwd($password)) {
                throw new \Exception("Senha Invalida!!");
                return false;
            }
            $data = (new User())->findByTerms($user);
            if (!$data) {
                throw new \Exception("Usuário não correspondem aos nossos registros. Verifique e tente novamente.");
                return false;
            }
            if (!passwd_verify($password, $data->password)) {
                throw new \Exception("Senha informada está incorreta");
                return false;
            }
            if (passwd_rehash($data->password)) {
                $data->password = $password;
                $data->save();
            }

            (new Session())->set("authUser", $data->id);
            return true;
        } catch (\Exception $exception) {
            $this->fail = $exception;
            return false;
        }
    }

    /**
     * @return bool
     */
    public function register(User $user): bool
    {
        try {
            if (!is_email($this->email)) {
                throw new \Exception("E-mail informado invalido!!");
                return false;
            }
            if (!is_passwd($this->password)) {
                $min = PASSWD['min'];
                $max = PASSWD['max'];
                throw new \Exception("A senha deve ter entre {$min} e {$max} caracteres");
                return false;
            } else {
                $this->password = passwd($this->password);
            }
            if ($user->findByEmail($this->email, "id")) {
                throw new \Exception("E-mail já cadastrado!!");
                return false;
            }
            if ($user->findByUser($this->user, "id")) {
                throw new \Exception("Nome de usuário já cadastrado!!");
                return false;
            }
            if (!$user->save()) {
                return false;
            }

            $mail = new BrMailer();
            $message = $mail->template(VIEWS['shared'] . "emails")->renderTemplate("confirm", [
                "username" => $this->user,
                 "confirm_link" => url("/obrigado/" . base64_encode($this->email))
            ]);
            $mail->bootstrap(
                "Ative sua conta no" . SITE['name'],
                $message,
                $this->email,
                "{$this->name}"
            )->send();

            return true;
        } catch (\Exception $exception) {
            $this->fail = $exception;
            return false;
        }
    }
}
