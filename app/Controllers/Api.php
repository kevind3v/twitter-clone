<?php

namespace App\Controllers;

use App\Models\Auth;

class Api
{
    /** @var array|null */
    private $data;

    public function __construct()
    {
        if (Auth::user()) {
            $this->data['status'] = 400;
            $this->data['error']  = 'Invalid access token';
            echo $this->json();
            exit;
        }
    }

    /** Upload Images */
    public function images(array $data)
    {
        var_dump($data);
    }

    /** Show Json */
    public function json(): string
    {
        return json_encode($this->data);
    }
}
