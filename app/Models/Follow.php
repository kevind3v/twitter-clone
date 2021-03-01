<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Follow extends DataLayer
{
    public function __construct()
    {
        parent::__construct("follow", ["following", "followed"]);
    }
}
