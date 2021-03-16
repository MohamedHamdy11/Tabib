<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\ContactUs;
use Validator;

class AuthUserController extends Controller
{
    // register (sing up, 50)
    public function register(Request $request) {

        $valid = Validator::make($request->all(), [
            'first_name'  => 'required|string',
            'last_name'  => 'required|string',
            'email' => 'required|string|email|unique:users',
            'mobile' => 'required|string|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        if($valid->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $valid->errors()
            ], 422);
        }

        User::create([
            "first_name"  => $request->first_name,
            "last_name"  => $request->last_name,
            "email" => $request->email,
            "mobile" => $request->mobile,
            "password" => bcrypt($request->password)
        ])->sendEmailVerificationNotification();
        // $user = new User([
        //     "first_name"  => $request->first_name,
        //     "last_name"  => $request->last_name,
        //     "email" => $request->email,
        //     "mobile" => $request->mobile,
        //     "password" => bcrypt($request->password)
        // ])->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Successfully created user'
        ], 201);

    } // end of register

    // login user & create token
    public function login(Request $request) {

        $request->validate([
            'email' => 'required|string|email',
            'password'=> 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = $request->only("email", "password");
        if($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
            $user =Auth::guard('api')->user();
            // return response()->json([
            //     'access_token' => $token,
            //     'token_type'  => 'bearer',
            // 'expires_in' => $this->guard()->factory()->getTTL() *3600
            //     'expires_in' => auth()->factory()->getTTL() *3600
            // ]);
            return response()->json(['status' => 'success','massage'=>__("admin.login") ,'token'=>$token,'data'=>$user]);

        }

    } // end of login

    private function guard() {
        return Auth::guard('api');
    }


    // Refresh JWT token.
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    // Get profile the authenticated User .
    public function userProfile()
    {
        $user = User::find(Auth::user()->id);
        return response()->json(['data' => $user]);
        //return response()->json(auth()->user());
    }

    // update user profile the authenticated user
    public function updateUserProfile(Request $request)
    {
        //$userId = $request->user()->id;
        //$userId = Auth::user()->id;
        $valid  = Validator::make($request->all(), [
            'first_name'  => 'required|string',
            'last_name'  => 'required|string',
            'email' => 'required|string|email|unique:users',
            'mobile' => 'required|string|unique:users',
        ]);

        if($valid->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $valid->errors()
            ], 422);
        }

        $userUpdate = User::find(Auth::user()->id);
            $userUpdate->first_name  = $request->first_name;
            $userUpdate->last_name  = $request->last_name;
            $userUpdate->email    = $request->email;
            $userUpdate->mobile  = $request->mobile;
            $userUpdate->update($request->all());

        return response()->json([
            'message' => 'Successfully updated user',
            'data'    => $userUpdate
        ], 200);

    }

    // change password user
    function changePassword(Request $request) {
        $valid = Validator::make($request->all(), [
            'oldPassword' => 'required|string|min:6',
            'newPassword' => 'required|string|min:6|confirmed'
        ]);

        $data = $request->all();
        $user = Auth::guard('api')->user(); // get user login

        //checking the old password first Auth::user()->id
        $check  = Auth::guard('api')->attempt([
            'email' => $user->email,
            'password' => $data['oldPassword']
        ]);
        if($check && $valid) {
            $user->password = bcrypt($data['newPassword']);
            //Changing the type
            $user->save();
            //return json_encode(array('token' => $check)); //sending the new token
            return response()->json(['message' => 'Successfully Change Password User'], 201);

        } // end of if

    } // end of change password Contact us

    public function Contact_Us(Request $request)
    {
        $valid  = Validator::make($request->all(), [
            'name'  => 'required|string',
            'email' => 'required|string|email',
            'message' => 'required|string',
        ]);

        if($valid->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $valid->errors()
            ], 422);
        }


        ContactUs::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message
        ]);

        return response()->json(['message' => 'Successfully created message'], 201);

    } // end of Contact us


    // logout user form application
    public function logout()
    {
        $this->guard()->logout();
        return response()->json(['message' => 'Successfully logged out.'], 200);

    } // end of logout

    // Get the token array structure.
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            //'token_type'  => 'bearer',
            //'expires_in' => auth('api')->factory()->getTTL() * 3600
            //'expires_in' => $this->guard()->factory()->getTTL() *3600
        ]);
    } // end of respond with token 




}
