<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::user()->tokens()->delete();

        return ['mensaje' => 'Usuario desconectado'];
    }
}
