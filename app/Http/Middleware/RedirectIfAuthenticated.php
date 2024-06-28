<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Jika pengguna sudah terautentikasi, arahkan sesuai peran (role)
                $role = Auth::user()->role->role_slug;

                switch ($role) {
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                        break;
                    case 'ormawa':
                        return redirect()->route('ormawa.ajukansurat');
                        break;
                    case 'komisi-i':
                        return redirect()->route('komisi-i.agenda.index');
                        break;
                    case 'komisi-ii':
                        return redirect()->route('komisi-ii.agenda.index');
                        break;
                    case 'komisi-iii':
                        return redirect()->route('komisi-iii.agenda.index');
                        break;
                    case 'komisi-iv':
                        return redirect()->route('komisi-iv.agenda.index');
                        break;
                    case 'badan-anggaran':
                        return redirect()->route('badan-anggaran.agenda.index');
                        break;
                    case 'badan-legislasi':
                        return redirect()->route('badan-legislasi.agenda.index');
                        break;
                    case 'badan-kehormatan':
                        return redirect()->route('badan-kehormatan.agenda.index');
                        break;
                    case 'bksap':
                        return redirect()->route('bksap.agenda.index');
                        break;
                    case 'burt':
                        return redirect()->route('burt.agenda.index');
                        break;
                    case 'pimpinan':
                        return redirect()->route('pimpinan.proposal.belum-diperiksa');
                        break;
                    default:
                        return redirect()->route('index'); // Ganti dengan nama rute yang sesuai
                }
            }
        }

        return $next($request);
    }
}
