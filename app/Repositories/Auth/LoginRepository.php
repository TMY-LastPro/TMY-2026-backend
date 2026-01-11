<?php

namespace App\Repositories\Auth;

use App\Repositories\Contracts\Auth\LoginRepositoryInterface;

class LoginRepository implements LoginRepositoryInterface
{

    public function login(array $credentials)
    {
        $token = auth()->attempt($credentials);
        if(!$token){
            return null;
        }
        return $token;
    }

    public function logout()
    {
        auth()->logout();
    }

    public function refresh()
    {
        return auth()->refresh();
    }
}
