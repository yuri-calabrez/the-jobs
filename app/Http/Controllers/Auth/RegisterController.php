<?php

namespace App\Http\Controllers\Auth;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.app.register-candidate');
    }

    public function showRecruiterRegistrationForm()
    {
        return view('auth.app.register-recruiter');
    }

    public function registerCandidate(Request $request)
    {
        $data = $request->all();
        $data['login_type'] = 'default';

        $this->validator($data)->validate();
        event(new Registered($user = $this->create($data)));
        $user->userable()->associate($this->createCandidate());
        $user->save();
        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    public function registerRecruiter(Request $request)
    {
        $data = $request->all();
        $data['login_type'] = 'default';

        $this->validator($data)->validate();
        event(new Registered($user = $this->create($data)));
        $recruiter = Company::create([]);
        $user->userable()->associate($recruiter);
        $user->save();
        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'login_type' => $data['login_type']
        ]);
    }

    protected function registered(Request $request, $user)
    {
        if($user->userable instanceof \App\Models\Candidate) {
            return redirect()->route('candidate.dashboard');
        }

        if($user->userable instanceof \App\Models\Company) {
            return redirect()->route('recruiter.dashboard');
        }
    }

    protected function createCandidate()
    {
        $candidate = Candidate::create([]);
        return $candidate;
    }
}
