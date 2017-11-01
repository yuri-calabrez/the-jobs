<?php

namespace App\Providers;

use App\Contracts\Repositories\{CandidateRepository, UserRepository};
use App\Repositories\{CandidateRepositoryEloquent, UserRepositoryEloquent};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(CandidateRepository::class, CandidateRepositoryEloquent::class);
    }
}
