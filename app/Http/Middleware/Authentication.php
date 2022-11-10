<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()  )
        {
            // disable edit,delete and create request in demo
            // if(!$request->isMethod('get'))
            // {
            //     return back()->withErrors([
            //         'demo_error' => 'not allowed to do this in demo version',
            //     ])->onlyInput('email');
            // }
            return $next($request);
        }
        return redirect('login')->with('auth_error','You are not authenticated user');
        
    }
}
