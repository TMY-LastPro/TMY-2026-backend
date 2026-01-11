<?php

namespace App\Services\Auth;

use App\Repositories\Contracts\Auth\LoginRepositoryInterface;
use Exception;
class LoginService
{
    protected $repo;
    public function __construct()
    {
        $this->repo = app(LoginRepositoryInterface::class);
    }
    public function login($credentials)
    {
        // Gọi repository để lấy token
        $token = $this->repo->login($credentials);

        if (!$token) {
            throw new Exception('Email or Password Invalid', 401);
        }

        return $this->createNewTokenStructure($token);
    }

    // Helper function để format response
    protected function createNewTokenStructure($token)
    {
        return [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
            'user'         => auth()->user()
        ];
    }

    public function logout()
    {
        $this->repo->logout();
    }
    public function refresh(){
        try{
            $newToken = $this->repo->refresh();
            return $this->createNewTokenStructure($newToken);
        }catch (\Exception $e){
            throw new Exception('Can not Refresh token !!!,Token Expired', 401);
        }
    }
}
