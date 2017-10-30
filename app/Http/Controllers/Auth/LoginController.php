<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.app.login-candidate');
    }

    public function showRecruiterLoginForm()
    {
        return view('auth.app.login-recruiter');
    }


    protected function authenticated(Request $request, $user)
    {
        if($user->userable instanceof \App\Models\Candidate) {
            return redirect()->route('candidate.dashboard');
        }

        if($user->userable instanceof \App\Models\Company) {
            return redirect()->route('recruiter.dashboard');
        }
    }
}
