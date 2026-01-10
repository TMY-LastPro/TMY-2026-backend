<?php

namespace App\Repositories;

use App\Http\Requests\AddUserRequest;
use App\Models\User;
use App\Repositories\Contracts\AddUserRepositoryInterface;
use Illuminate\Http\Request;

class AddUserRepository implements AddUserRepositoryInterface
{

    public function addUser(array $array)
    {
        return User::create($array);
    }
}
