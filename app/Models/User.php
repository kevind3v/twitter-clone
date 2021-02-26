<?php

namespace App\Models;

use BrBunny\BrMailer\BrMailer;
use BrBunny\BrPlates\BrPlates;
use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer
{
    /** User Constructor */
    public function __construct()
    {
        parent::__construct("users", ["name", "user", "email", "password"]);
    }

    /**
     * @param string $name
     * @param string $username
     * @param string $email
     * @param string $password
     * @return User|null
     */
    public function bootstrap(
        string $name,
        string $username,
        string $email,
        string $password
    ): ?User {
        $this->name = $name;
        $this->user = $username;
        $this->email = $email;
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $email
     * @param string $columns
     * @return User|null
     */
    public function findByEmail(string $email, string $columns = "*"): ?User
    {
        $find = $this->find("email = :email", "email={$email}", $columns);
        return $find->fetch();
    }

    /**
     * @param string $email
     * @param string $columns
     * @return User|null
     */
    public function findByUser(string $user, string $columns = "*"): ?User
    {
        $find = $this->find("user = :user", "user={$user}", $columns);
        return $find->fetch();
    }

    /**
     * @return bool|null
     */
    public function register(): ?bool
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
            if ($this->findByEmail($this->email, "id")) {
                throw new \Exception("E-mail já cadastrado!!");
                return false;
            }
            if ($this->findByUser($this->user, "id")) {
                throw new \Exception("Nome de usuário já cadastrado!!");
                return false;
            }
            if (!$this->save()) {
                return false;
            }

            $view = new BrPlates(VIEWS['shared'] . "emails");
            $message = $view->render("confirm", [
            "username" => $this->user,
            "confirm_link" => url("/obrigado/" . base64_encode($this->email))
            ]);

            (new BrMailer())->bootstrap(
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
