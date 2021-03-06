<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Tweets extends DataLayer
{
    public function __construct()
    {
        parent::__construct("tweets", ["author"]);
    }

    public function bootstrap(): Tweets
    {
        return $this;
    }
}
