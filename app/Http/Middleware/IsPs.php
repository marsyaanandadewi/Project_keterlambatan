<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsPs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role == 'ps'){
            session('checkIsAdmin',false);
            return $next($request);
        }else {
            session('checkIsAdmin',false);
            return redirect()->route('login')->with('failed', 'Anda bukan admin, silahkan login sebagai admin');
        }
    }
}
