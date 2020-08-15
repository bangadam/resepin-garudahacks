<?php

namespace App\Http\Middleware;

use Closure;

class Apotik
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->check())
            return redirect('login');

        $user = auth()->user()->load('hasRoles.role');
        if ($user->hasRoles->role->name == 'apoteker') {
            return $next($request);
        }
        return redirect()->back()->withErrors('msg', 'anda tidak berhak mengakses halaman ini');
    }
}
