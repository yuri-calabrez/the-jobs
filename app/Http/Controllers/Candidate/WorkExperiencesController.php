<?php

namespace App\Http\Controllers\Candidate;

use App\Contracts\Repositories\WorkExperienceRepository;
use App\Http\Requests\Candidate\WorkExperienceRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkExperiencesController extends Controller
{
    /**
     * @var WorkExperienceRepository
     */
    private $repository;

    public function __construct(WorkExperienceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repository->orderBy('id', 'DESC')->all();
        return $data;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkExperienceRequest $request)
    {
        $data = $request->except('candidate_id');
        $data['candidate_id'] = \Auth::user()->userable->id;
        $this->repository->create($data);
        return response()->json(['success' => true]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workExperience = $this->repository->find($id);
        return $workExperience;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkExperienceRequest $request, $id)
    {
        $data = $request->except(['id', 'candidate_id']);
        $this->repository->update($data, $id);
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
    }
}
