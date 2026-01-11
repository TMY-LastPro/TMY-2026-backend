<?php

namespace App\Providers;

use App\Repositories\Auth\LoginRepository;
use App\Repositories\Contracts\AddUserRepositoryInterface;
use App\Repositories\AddUserRepository;
use App\Repositories\Contracts\Auth\LoginRepositoryInterface;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
