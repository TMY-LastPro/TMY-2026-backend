<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\AddUserRequest;
use Illuminate\Http\Request;

interface AddUserRepositoryInterface
{
    public function addUser(array $array);
}
