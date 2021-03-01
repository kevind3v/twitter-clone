<?php

namespace App\Models;

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
        return $this->find("email = :email", "email={$email}", $columns)->fetch();
    }

    /**
     * @param string $email
     * @param string $columns
     * @return User|null
     */
    public function findByUser(string $user, string $columns = "*"): ?User
    {
        return $this->find("user = :user", "user={$user}", $columns)->fetch();
    }

    /**
     * @param string $email
     * @param string $columns
     * @return User|null
     */
    public function findByTerms(string $terms, string $columns = "*"): ?User
    {
        $params = http_build_query(["user" => "{$terms}", "email" => "{$terms}"]);
        return $this->find("user = :user OR email = :email", $params, $columns)->fetch();
    }

    public function users(int $id)
    {
        return $this->find("id != :id", $id)->fetch(true);
    }
}
