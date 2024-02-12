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
use Illuminate\Validation\ValidationException; // Import ValidationException class

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


    // login
    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                $role = Auth::user()->role->role_slug;
                // Check user role and redirect accordingly
                if ($role === 'admin') {
                    return redirect()->intended('/admin');
                } elseif ($role === 'ormawa') {
                    return redirect()->intended('/ormawa/ajukansurat');
                } elseif ($role === 'komisi') {
                    return redirect()->intended('/komisi/agendakerja');
                }

                // If user role is not defined or recognized, you can redirect them to a default page
                return redirect()->intended('/');
            }

            // If authentication fails, redirect back with error message
            return redirect()->route('login')->with('error', 'The provided credentials do not match our records.');
        } catch (\Exception $e) {
            return response_error(null, $e->getMessage(), $e->getCode());
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
