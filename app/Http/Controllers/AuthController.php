<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login' , "register"]]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * 
     */

     public function register(Request $request)
    { 
        // Create new user
        if (User::where('email', '=', $request->email)->exists()) {
            return response()->json(['status' => 'error', 'message' => 'User already exists with this email']);
        }
        
            $user = new User();
            $user->nomCl = $request->nomCl;
            $user->prenomCl = $request->prenomCl;
            $user->poidsCl = $request->poidsCl;
            $user->ageCl = $request->ageCl;
            $user->dateCl = $request->dateCl;

            $user->email = $request->email;
            $user->password = app('hash')->make($request->password);
            $user->save();
    
            // Save user in the db
            if($user->save());{
                return response()->json(["status"=> "done" ,'message' => 'User registered successfully']);
            }
            


        
    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['msg' => 'Unauthorized']);
        }
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth::refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth::factory()->getTTL() * 60
        ]);
    }
}