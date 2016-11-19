<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Dashboard
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
        if (!Auth::check() && !Auth::user()->is_charged) {

            return redirect('/register')->with('success','Sorry!! At first u\'ve to register and pay as well');

        }elseif(Auth::check() && !Auth::user()->is_charged){

            return redirect('/payment')->with('success','Now you have to pay first');
        }

        return $next($request);

    }
}
