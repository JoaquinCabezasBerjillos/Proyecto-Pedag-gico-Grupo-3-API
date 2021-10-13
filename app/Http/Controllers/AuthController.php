<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\Models\User;


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
<<<<<<< HEAD
    
}
    public function logout()

    {   
        Auth::user()->tokens()->delete();

        return ['mensaje' => 'Usuario desconectado'];
    }
};
=======
    }
        public function logout()
          {
              Auth::user()->tokens()->delete();
           } 
        public function register(Request $request) {
            // Validar los datos
            $credentials = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);

            // Encrypt Password
            $credentials['password'] = Hash::make($credentials['password']);

            // Crear usuario nuevo
            $usuario = User::create($credentials);
            
            // Generar el token
            $token = $usuario->createToken('TokenUsuario')->plainTextToken;

            // Devolver una respuesta
            $respuesta = [
                'data' => [
                    'usuario' => $usuario,
                    'token' => $token
                ],
            ];

            return response()->json($respuesta);
        }

          
    public function logout()
    {
        Auth::user()->tokens()->delete();

        return ['mensaje' => 'Usuario desconectado'];


    }

}
>>>>>>> c0b3f9a6f06d9f22a092e09638b78f2d8ce9aeaa
