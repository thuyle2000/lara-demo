<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if ($request->session()->has('user')) {

            $user = $request->session()->get('user');
            // dd($roles); // echo + exit
            
            $r = $user->role == 1 ? "admin" : "user";
            if (in_array($r, $roles)) {
                return $next($request);
            }
        }
        return redirect('login');
    }
}
