<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository extends Repository
{

    public function model()
    {
        return User::class;
    }
}
