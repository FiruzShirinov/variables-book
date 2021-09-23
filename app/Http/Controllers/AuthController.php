<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(UserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json([
            'user' => new UserResource($user)
        ], 200);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(UserRequest $request)
    {
        if(!auth()->attempt($request->validated())) {
            return response()->json([
                'message' => 'Введен неправильный адрес электронной почты или пароль, пожалуйста попробуйте еще раз.',
            ], 401);
        }

        $token = auth()->user()->createToken($request->phone)->accessToken;

        return response()->json([
            'token' => $token,
            'user'  => new UserResource(auth()->user())
        ], 200);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message'   => 'Вы успешно вышли из приложения.'
        ], 200);
    }
}
