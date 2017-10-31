<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
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

    public function loginSocial(Request $request)
    {
        $this->validate($request, [
           'social_type' => 'required|in:facebook,github'
        ]);
        $socialType = $request->get('social_type');
        \Session::put('social_type', $socialType);
        return \Socialite::driver($socialType)->redirect();
    }

    public function loginSocialCallback()
    {
        $socialType = \Session::pull('social_type');
        $userSocial = \Socialite::driver($socialType)->user();
        $user = User::where('email', $userSocial->email)->first();
        if(!$user) {
            $user = User::create([
               'name' => $userSocial->name,
               'email' => $userSocial->email,
               'password' => bcrypt(str_random(6)),
               'login_type' => 'social'
            ]);

            $candidate = \App\Models\Candidate::create([]);
            $user->userable()->associate($candidate);
            $user->save();
        }
        \Auth::login($user);
        return redirect()->intended(route('candidate.dashboard'));
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
