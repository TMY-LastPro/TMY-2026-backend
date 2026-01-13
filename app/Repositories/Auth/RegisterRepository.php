<?php

namespace App\Repositories\Auth;

use App\Repositories\Contracts\Auth\RegisterRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Exception;

class RegisterRepository implements RegisterRepositoryInterface
{

    public function register(array $credentials, array $address)
    {
        DB::beginTransaction();
        try{
            $user = User::create($credentials);
            $user->addresses()->create([
                'recipient_name' => $address['recipient_name'] ?? $user->name,
                'phone' => $address['phone'] ?? $user->phone,
                'address_line' => $address['address_line'],
                'ward' => $address['ward'],
                'district' => $address['district'],
                'city' => $address['city'],
                'is_default' => true,
            ]);
            DB::commit();
            return $user;
        }catch(\Exception $e){
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
