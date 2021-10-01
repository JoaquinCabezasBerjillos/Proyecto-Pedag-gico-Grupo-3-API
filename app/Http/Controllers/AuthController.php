<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([

            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //Verificar si el email existe y la contraseña es correcta
        // dd($credentials);
        
        if (Auth::attempt($credentials)) {
            //logueamos
            $usuarioLogueado = Auth::user();
            //generamos el token
            $token = $usuarioLogueado->createToken('TokenUsuario')->plainTextToken;

            $respuesta = [

                'data' => [

                    'usuario' => $usuarioLogueado,
                    'token' => $token,
                ]
            ];
            //devolvemos el token
            return response()->json($respuesta);
        } else {

            return response()->json(['error' => 'Unauthorised'], 401);
        }

          public function logout()
          {
              Auth::user()->tokens()->delete();

              return ['mensaje' => 'Usuario desconectado'];

          }
}
