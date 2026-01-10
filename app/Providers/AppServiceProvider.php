<?php

namespace App\Providers;

use App\Repositories\Contracts\AddUserRepositoryInterface;
use App\Repositories\AddUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AddUserRepositoryInterface::class, AddUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
