<?php

namespace App\Http\Middleware;

use App\Models\Candidate;
use App\Models\Company;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->userable instanceof Candidate) {
                return redirect()->route('candidate.dashboard');
            } elseif (Auth::user()->userable instanceof Company) {
                return redirect()->route('recruiter.dashboard');
            } else {
                return redirect('/home');
            }

        }

        return $next($request);
    }
}
