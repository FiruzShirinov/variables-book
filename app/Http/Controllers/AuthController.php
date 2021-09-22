<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $user = User::create($request->all());

        return response()->json([
            'user' => $user
        ], 200);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:8|max:50'
        ]);

        if(!auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Введен неправильный адрес электронной почты или пароль, пожалуйста попробуйте еще раз.',
            ], 401);
        }

        $token = auth()->user()->createToken($request->phone)->accessToken;

        return response()->json([
            'user'  => auth()->user(),
            'token' => $token
        ]);
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
