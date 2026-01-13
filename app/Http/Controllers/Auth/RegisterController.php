<?php

namespace App\Http\Controllers\Auth;

use App\Services\Auth\RegisterService;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Exception;

class RegisterController
{
    protected $service;
    public function __construct(RegisterService $service)
    {
        $this->service = $service;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try{
            $data = $request->validated();
            $file = $request->file('avatar');

            $user = $this->service->register($data, $file);

            return response()->json([
               'message' => 'Register success',
               'data' => $user
            ],201);
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'error'
            ], $e->getCode() ?: 400);
        }
    }
}
