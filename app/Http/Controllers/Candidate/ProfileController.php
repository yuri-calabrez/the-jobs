<?php

namespace App\Http\Controllers\Candidate;

use App\Contracts\Repositories\CandidateRepository;
use App\Contracts\Repositories\UserRepository;
use App\Http\Requests\Candidate\ProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * @var CandidateRepository
     */
    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(CandidateRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user = $this->userRepository->with('userable')->find(\Auth::user()->id);
        $candidate = $user->userable;
        return view('app.candidates.profile', compact('candidate', 'user'));
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $id = \Auth::user()->userable->id;
        $data = $request->all();
        $candidate = $this->repository->update($data, $id);
        //upload foto
        $request->session()->flash('success', 'Perfil atualizado com sucesso!');
        return redirect()->route('candidate.profile');
    }
}
