<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\WorkExperienceRepository;
use App\Models\WorkExperience;
use App\Validators\WorkExperienceValidator;

/**
 * Class WorkExperienceRepositoryEloquent
 * @package namespace App\Repositories;
 */
class WorkExperienceRepositoryEloquent extends BaseRepository implements WorkExperienceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return WorkExperience::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
