<?php

namespace App\Repositories;


use App\Contracts\Repositories\CandidateRepository;
use App\Models\Candidate;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class CandidateRepositoryEloquent extends BaseRepository implements CandidateRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Candidate::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}