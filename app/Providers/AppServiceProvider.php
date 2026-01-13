<?php

namespace App\Providers;

use App\Repositories\Auth\LoginRepository;
use App\Repositories\Auth\RegisterRepository;
use App\Repositories\Contracts\AddUserRepositoryInterface;
use App\Repositories\AddUserRepository;
use App\Repositories\Contracts\Auth\LoginRepositoryInterface;
use App\Repositories\Contracts\Auth\RegisterRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AddUserRepositoryInterface::class, AddUserRepository::class);
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
        $this->app->bind(RegisterRepositoryInterface::class, RegisterRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
