<?php

namespace App\Providers;

use App\Contracts\Repositories\{
    CandidateRepository, EducationRepository, SkillRepository, UserRepository, WorkExperienceRepository
};
use App\Repositories\{
    CandidateRepositoryEloquent, EducationRepositoryEloquent, SkillRepositoryEloquent, UserRepositoryEloquent,
    WorkExperienceRepositoryEloquent
};
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
        $this->app->bind(EducationRepository::class, EducationRepositoryEloquent::class);
        $this->app->bind(WorkExperienceRepository::class, WorkExperienceRepositoryEloquent::class);
        $this->app->bind(SkillRepository::class, SkillRepositoryEloquent::class);
    }
}
