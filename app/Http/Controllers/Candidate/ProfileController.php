<?php

namespace App\Http\Controllers\Candidate;

use App\Contracts\Repositories\UserRepository;
use App\Http\Requests\Candidate\ProfileUpdateRequest;
use App\Services\CandidateService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var CandidateService
     */
    private $service;

    public function __construct(CandidateService $service, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->service = $service;
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
        $this->service->updateProfile($request->all(), $id);
        $request->session()->flash('success', 'Perfil atualizado com sucesso!');
        return redirect()->route('candidate.profile');
    }
}
