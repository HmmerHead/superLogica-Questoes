<?php

namespace App\Providers;

use App\Repositories\Api\UserApiRepository;
use App\Repositories\Contracts\Api\UserApiInterface;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceprovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserInterface::class,
            UserRepository::class,
        );

        $this->app->bind(
            UserApiInterface::class,
            UserApiRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
