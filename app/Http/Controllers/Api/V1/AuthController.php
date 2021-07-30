<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login()
    {
        $credentials = request(['username', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
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
        return response()->json([
           'user'=>auth('api')->user(),
            'roles'=>auth('api')->user()->roles
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'شما با موفقیت خارج شدید']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
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
            'user'=>auth('api')->user(),
            'roles'=> auth('api')->user()->roles(),
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    protected function register(UserRequest $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'password'=>Hash::make($request->password)
        ]);



        return response()->json([
            'message'=>'کاربر شما با موفقیت ثبت نام شد ',
        ],200);
    }
}
