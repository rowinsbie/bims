<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AuthenticationController extends Controller
{
    protected $credentials = [];

    public function Authenticate(Request $request) {
        
        // fetch credentials from the login form
        $this->credentials = [
            'resident_number' => $request->resident_number,
            'password' => $request->password
        ];

        // Authenticate credentials
        if(!Auth::attempt($this->credentials)) {
            return response()->json([
                'message' => 'Username or password is incorrect'
            ],422);
        }

        // If the credentials authenticated successfully, generate a token
        $user = User::where('resident_number',$this->credentials['resident_number'])->first();
        $token = $user->createToken($user->id)->plainTextToken;
        return response()->json([
            'uid' => $user->id,
            'token' => $token,
            'message' => 'Access Granted'
        ]);
    }

    // delete the valid token 
    public function SignOut(Request $request) {
        // check if the user is authenticated
        if(Auth::check()) {
            Auth()->user()->tokens()->delete();
            return response()->json([
                'message' => 'Token has been deleted'
            ]);
        }
    }
}
