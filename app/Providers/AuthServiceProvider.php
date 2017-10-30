<?php

namespace App\Providers;

use App\Models\Candidate;
use App\Models\Company;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        \Gate::define('candidate', function($user){
           return $user->userable instanceof Candidate;
        });

        \Gate::define('recruiter', function($user){
            return $user->userable instanceof Company;
        });
    }
}
