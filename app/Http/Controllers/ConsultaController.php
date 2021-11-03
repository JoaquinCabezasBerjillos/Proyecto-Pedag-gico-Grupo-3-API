<?php

namespace App\Http\Controllers;
use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
   

    public function getCliente()
    {
        $sql = 'SELECT MOVIL, nombre, apellidos
        FROM users,
        WHERE users_id = users';
        
        $users = DB::select($sql);

        return [
        'data' => $users,
        'status' => 200
        ];
    }
    public function listaMascotas()
    {
        $sql = 'SELECT NOMBRE, chip, tipo
        FROM mascotas 
        WHERE mascota_id = mascota';
        
        $mascota = DB::select($sql);

        return [
        'data' => $mascota,

        'status' => 200
        ];
    } 
}
