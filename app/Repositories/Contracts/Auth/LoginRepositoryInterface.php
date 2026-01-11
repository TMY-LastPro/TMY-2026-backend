<?php

namespace App\Repositories\Contracts\Auth;

interface LoginRepositoryInterface
{
    public function login(array $credentials);
    public function logout();
    public function refresh();
}
