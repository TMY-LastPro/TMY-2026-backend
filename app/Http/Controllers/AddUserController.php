<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Services\AddUserService;

class AddUserController
{
    protected $service;
    public function __construct()
    {
        $this->service = app(AddUserService::class);
    }
    public function addUser(AddUserRequest $request)
    {
        $user = $this->service->addUser($request->validated());

        return response()->json([
            'message' => 'Add user success',
            'data' => $user
        ], 201);
    }

}
