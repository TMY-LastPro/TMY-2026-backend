<?php

namespace App\Services;

use App\Http\Requests\AddUserRequest;
use App\Repositories\Contracts\AddUserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class AddUserService
{
    protected $repo;
    public function __construct()
    {
        $this->repo = app(AddUserRepositoryInterface::class);
    }
    public function addUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->repo->addUser($data);
    }
}
