<?php

namespace App\Http\Controllers\Candidate;

use App\Contracts\Repositories\EducationRepository;
use App\Criteria\FindByCandidateCriteria;
use App\Http\Requests\Candidate\EducationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationsController extends Controller
{
    /**
     * @var EducationRepository
     */
    private $repository;

    public function __construct(EducationRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->pushCriteria(new FindByCandidateCriteria());
    }

    public function index()
    {
        $educations = $this->repository->all();
        return $educations;
    }

    public function store(EducationRequest $request)
    {
        $data = $request->except('candidate_id');
        $data['candidate_id'] = \Auth::user()->userable->id;
        $this->repository->create($data);
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $education = $this->repository->find($id);
        return $education;
    }

    public function update(EducationRequest $request, $id)
    {
        $data = $request->except(['id', 'candidate_id']);
        $this->repository->update($data, $id);
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
    }
}
