<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgot() {
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        return response()->json(['message' => 'Reset password link sent on your email id.']);
    } // end of forgot 

    public function reset() {
        
        $credentials = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);
    
        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = $password;
            $user->save();
        });
    
        if ($reset_password_status == Password::INVALID_TOKEN) {
            return response()->json(['message'=> 'Invalid token provided'], 400);
        }
    
        return response()->json(['message' => 'Password has been successfully changed']);
       
    } // end of reset


} // end of ForgotPasswordController
