<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ForgetPasswordCtrl extends Controller
{
    public function forgetPassword(){
        return view("auth.forgot-password");
    }

    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
        $expiryTime = now()->addMinutes(10); // Set expiry time to 10 minutes
        
        PasswordReset::where('email', $request->email)->delete(); // Delete previous password reset requests
        PasswordReset::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(), // Save creation time of token
        ]);

        Mail::send("email.forget-password", ['token' => $token], function($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route("password.request"))->with('success', "We Have Sent The Email");
    }

    public function resetPassword($token){
        // Check if the token is valid and not expired
        $passwordReset = PasswordReset::where('token', $token)->first();

        if(!$passwordReset || $passwordReset->created_at->addMinutes(10) < Carbon::now()) {
            return redirect()->route('password.request')->with('error', 'Token is invalid or expired.');
        }

        return view("auth.reset-password", compact('token'));
    }

    public function resetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'new_password' => 'required|string|min:8',
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        // Update user password
        $user->password = Hash::make($request->new_password);
        $user->save();
        
        // Delete all password reset requests for this email
        PasswordReset::where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Password has been reset successfully.');
    }
}
