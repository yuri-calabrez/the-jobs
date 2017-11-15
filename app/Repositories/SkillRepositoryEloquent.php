<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\SkillRepository;
use App\Models\Skill;

/**
 * Class SkillRepositoryEloquent
 * @package namespace App\Repositories\Candidate;
 */
class SkillRepositoryEloquent extends BaseRepository implements SkillRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Skill::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
