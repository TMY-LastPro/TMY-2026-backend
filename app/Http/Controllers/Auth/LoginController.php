<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\Contracts\Auth\LoginRepositoryInterface;
use App\Services\Auth\LoginService;
use Illuminate\Http\JsonResponse;

class LoginController
{
    protected $service;
    public function __construct(LoginService $service)
    {
        $this->service = $service;
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        try{
            $result = $this->service->login($credentials);
            return response()->json([
                'message' => 'Login success',
                'data' => $result
            ], 200);
        }catch (\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
                , 'data' => []
            ],$e->getCode() ?: 401);
        }
    }
    public function logout(): JsonResponse
    {
        try{
            $this->service->logout();
            return response()->json([
                'message' => 'Logout success'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }
    public function refresh(): JsonResponse
    {
        try{
            $result = $this->service->refresh();
            return response()->json([
                'message' => 'Refresh token success',
                'data' => $result
            ]);
        }catch (\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }
}
