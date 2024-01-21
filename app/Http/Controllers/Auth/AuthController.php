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

class AuthController extends Controller
{
    // Create Account
    public function createAccount(CreateAccountRequest $request) {
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
            $user = User::where('email', $request->input('email'))->first();
            if (!$user) {
                throw new Exception('Akun Tidak Ditemukan!', 400);
            }
            if (empty($user) || !Hash::check($request->input('password'), $user->password)) {
                throw new Exception('Email/Password Salah!', 400);
            }
            if (!$token = auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $data = [
                'id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'role' => auth()->user()->role->role_slug,
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ];
            return response_success($data, "Login successfully");
        } catch (\Exception $e) {
            return response_error(null, $e->getMessage(), $e->getCode());
        }
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try {
            auth()->logout();
            return response_success(null, 'Successfully logged out');
        } catch (\Exception $e) {
            return response_success(null, $e->getMessage(), $e->getCode());
        }
    }

}
