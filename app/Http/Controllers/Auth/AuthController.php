<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAccountRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Validation\ValidationException; 

class AuthController extends Controller
{
    public function index()
    {
        return  view('auth.login');
    }

    // Create Account
    public function createAccount(CreateAccountRequest $request)
    {
        try {
            $existingUser = User::where('email', $request->input('email'))
                ->orWhere('name', $request->input('name'))
                ->first();

            if ($existingUser) {
                return response_error(null, 'Email or name already exists', 422);
            }

            $user = new User([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role_id' => $request->input('role_id'),
            ]);

            $user->save();

            return response_success('Account created successfully', $user, 201);
        } catch (\Exception $e) {
            return response_error(null, $e->getMessage(), $e->getCode());
        }
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
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
        } else {
            return back()->withInput()->withErrors([
                'email' => 'email/password salah',
            ]);
        }
    }
    
    /**
     * Log the user out (Invalidate the token).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }    
}    


