<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array|string  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check() || !in_array(Auth::user()->user_hak, $roles)) {
            return redirect('/login'); // Atau halaman lain yang sesuai
        }

        return $next($request);
    }
}
