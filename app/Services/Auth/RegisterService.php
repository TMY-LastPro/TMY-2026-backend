<?php

namespace App\Services\Auth;

use App\Repositories\Contracts\Auth\RegisterRepositoryInterface;
use App\Services\ImagesService;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    protected $repo;
    protected $imageService;
    public function __construct(RegisterRepositoryInterface $repo, ImagesService $imageService)
    {
        $this->repo = $repo;
        $this->imageService = $imageService;
    }

    public function register($requestData, $file = null){
        $avatar_url = null;
        if($file){
           $avatar_url = $this->imageService->upload($file);
        }
        $userData = [
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password']),
            'avatar_url' => $avatar_url,
            'phone' => $requestData['phone'] ?? '',
            'role' => 'customer',
        ];

        $address = [
            'recipient_name' => $requestData['recipient_name'] ?? '',
            'recipient_phone' => $requestData['recipient_phone'] ?? '',
            'address_line' => $requestData['address_line'] ?? '',
            'ward' => $requestData['ward'] ?? '',
            'district' => $requestData['district'] ?? '',
            'city' => $requestData['city'] ?? '',
        ];
        return $this->repo->register($userData, $address);
    }
}
