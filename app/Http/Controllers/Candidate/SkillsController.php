<?php

namespace App\Http\Controllers\Candidate;

use App\Contracts\Repositories\SkillRepository;
use App\Criteria\FindByCandidateCriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillsController extends Controller
{

    /**
     * @var SkillRepository
     */
    private $repository;

    public function __construct(SkillRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->pushCriteria(new FindByCandidateCriteria());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'percentage' => 'required|numeric|max:100'
        ]);
        $data = $request->all();
        $data['candidate_id'] = \Auth::user()->userable->id;
        $this->repository->create($data);
        return response()->json(['status' => 'ok'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'percentage' => 'required|numeric|max:100'
        ]);
        $data = $request->except(['candidate_id', 'id']);
        $this->repository->update($data, $id);
        return response()->json(['status' => 'ok']);
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
        return response()->json([], 204);
    }
}
