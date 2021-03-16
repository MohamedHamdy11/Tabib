<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class VerificationController extends Controller
{
    public function verify($user_id, Request $request) {
        if (!$request->hasValidSignature()) {
            return response()->json(['message' => 'Invalid/Expired url provided.'], 401);
        }
    
        $user = User::findOrFail($user_id);
    
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
    
        return redirect()->to('/');
    } // end of verify 
    
    public function resend() {
        if (Auth::guard('api')->user()->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified.'], 400);
        }
    
        Auth::guard('api')->user()->sendEmailVerificationNotification();
    
        return response()->json(['message' => 'Email verification link sent on your email id']);
    } // end of resend


} // end of VerificationController
