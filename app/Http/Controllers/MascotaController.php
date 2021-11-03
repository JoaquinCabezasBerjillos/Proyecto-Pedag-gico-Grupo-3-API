<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascota = Mascota::all();
        return $mascota;
    }

    public function store(Request $request)
    {
        
        $datos_validados = $request->validate([

            'nombre' => 'required|min:3',

            'chip' => 'required',

            'tipo' => 'required',

            'user_id' => 'required',

        ]);

        Mascota::create($datos_validados);
        return  ['mensaje' => "Mascota creada"];

    }

    public function show($id)
    {
        //Buscar mascota por nombre

        $mascota = Mascota::find($id);

        // comprobar que la mascota existe
        if (!$mascota) {

            return ['error' => 'mascota no creado'];
        }

        return ['datos' => $mascota];
    }

    
    public function update(Request $request, $id)
    {
        $datos_validados = $request->validate([
            
            'nombre' => 'string|min:3',

            'chip' => 'number',

            'foto' => 'string',

            'tipo' => 'string',

        ]);
        //Buscar mascota por nombre
        $mascota = Mascota::find($id);
        // comprobar que la mascota existe y si existe actualizar
        if (!$id) {
            return ['error' => 'No creada'];
        }
        //Actualizar la mascota
      
        $mascota->update($datos_validados);

        return ['mensaje' => 'Mascota actualizada'];
    }

    public function destroy($id)
    {
        Mascota::destroy($id);

        return ['mensaje' => 'Mascota borrada'];
    }

    public function savePhoto(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        
        $datos_validados = $request->validate([

            'foto' => 'string',

        ]);

        $mascota->update($datos_validados);
        return ['mensaje' => 'Imagen Subida'];
        
    }
}
