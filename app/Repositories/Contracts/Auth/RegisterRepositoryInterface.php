<?php

namespace App\Repositories\Contracts\Auth;

interface RegisterRepositoryInterface
{
    public function register(array $credentials, array $address);
}
