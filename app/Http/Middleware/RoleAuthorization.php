<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Periksa apakah pengguna sudah autentikasi
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Periksa peran pengguna
        if (!Auth::user()->role) {
            // Jika pengguna tidak memiliki peran, Anda dapat menentukan tindakan yang sesuai.
            abort(403, 'Unauthorized action.');
        }

        // Periksa apakah peran pengguna memiliki akses yang diperlukan
        if (Auth::user()->role->role_slug !== $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
