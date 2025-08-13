<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Izinkan akses ke halaman register meskipun sudah login
                if ($request->is('register')) {
                    return $next($request);
                }
                
                $user = Auth::user();
                
                // Redirect sesuai role user yang login untuk halaman lain
                switch ($user->role) {
                    case 'student':
                        return redirect('/dashboard');
                    case 'company':
                        return redirect('/company');
                    case 'admin':
                        return redirect('/admin');
                    default:
                        return redirect('/dashboard');
                }
            }
        }

        return $next($request);
    }
}
