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
        PasswordReset::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(), 
        ]);

        Mail::send("email.forget-password",['token'=>$token], function($message) use ($request){
            $message->to( $request->email);
            $message->subject("Reset Password");
        });
        return redirect()->to(route("password.request"))->with('succes', "We Have Send The Email");
    }

    public function resetPassword($token){
        return view("auth.reset-password", compact('token'));
    }

    public function resetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'new_password' => 'required|string|min:6',
        ]);
    $user = User::where('email', $request->email)->first();
    $user->password = Hash::make($request->new_password);
    $user->save();
    PasswordReset::where('email', $request->email)->delete();
    return redirect()->route('login')->with('success', 'Password has been reset successfully.');

        
    }
}
